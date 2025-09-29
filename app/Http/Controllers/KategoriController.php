<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::orderBy('id_kategori', 'asc')->get();
        return view('kategori.index', compact('kategori'));
    }

    public function create()
    {
        // Ambil ID terakhir
        $lastId = Kategori::max('id_kategori') ?? 0; // jika belum ada data, gunakan 0
        $nextId = $lastId + 1;

        return view('kategori.create', compact('nextId'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:50',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $kategori = Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->back()->with('success', true)->with('newId', $kategori->id);
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'keterangan' => 'nullable|string'
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'keterangan' => $request->keterangan,
        ]);

        // Kirim flash message untuk SweetAlert
        return redirect()->back()->with('success', 'Data Berhasil Diubah');
    }
    
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
