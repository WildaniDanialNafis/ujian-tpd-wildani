<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ArsipController extends Controller
{
    public function index()
    {
        $arsip = Arsip::with('kategori')->get();
        return view('arsip.index', compact('arsip'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('arsip.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori,id_kategori',
            'nomor_surat' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'file_surat' => 'nullable|file|mimes:pdf|max:2048',
        ], [
            'kategori_id.required' => 'Kategori harus dipilih.',
            'kategori_id.exists' => 'Kategori yang dipilih tidak valid.',
            'nomor_surat.required' => 'Nomor surat wajib diisi.',
            'nomor_surat.string' => 'Nomor surat harus berupa teks.',
            'nomor_surat.max' => 'Nomor surat maksimal 255 karakter.',
            'judul.required' => 'Judul wajib diisi.',
            'judul.string' => 'Judul harus berupa teks.',
            'judul.max' => 'Judul maksimal 255 karakter.',
            'file_surat.file' => 'File harus berupa file.',
            'file_surat.mimes' => 'File harus berformat PDF.',
            'file_surat.max' => 'Ukuran file maksimal 2MB.',
            'file_surat.uploaded' => 'Ukuran file maksimal 2MB.', // <--- tambahkan ini
        ]);

        $data = $request->only('kategori_id', 'nomor_surat', 'judul');

        if ($request->hasFile('file_surat')) {
            $file = $request->file('file_surat');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            $data['file_surat'] = 'uploads/' . $fileName;
        }

        Arsip::create($data);

        // Kalau request AJAX
        if ($request->ajax()) {
            return response()->json(['message' => 'Data berhasil ditambahkan.']);
        }

        // Fallback biasa
        return redirect()->route('arsip.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $arsip = Arsip::findOrFail($id);
        $kategori = Kategori::all();
        return view('arsip.edit', compact('arsip', 'kategori'));
    }

    public function update(Request $request, Arsip $arsip)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori,id_kategori',
            'nomor_surat' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'file_surat' => 'nullable|file|mimes:pdf|max:2048',
        ], [
            'kategori_id.required' => 'Kategori harus dipilih.',
            'kategori_id.exists' => 'Kategori yang dipilih tidak valid.',
            'nomor_surat.required' => 'Nomor surat wajib diisi.',
            'nomor_surat.string' => 'Nomor surat harus berupa teks.',
            'nomor_surat.max' => 'Nomor surat maksimal 255 karakter.',
            'judul.required' => 'Judul wajib diisi.',
            'judul.string' => 'Judul harus berupa teks.',
            'judul.max' => 'Judul maksimal 255 karakter.',
            'file_surat.file' => 'File harus berupa file.',
            'file_surat.mimes' => 'File harus berformat PDF.',
            'file_surat.max' => 'Ukuran file maksimal 2MB.',
            'file_surat.uploaded' => 'Ukuran file maksimal 2MB.', // <--- tambahkan ini
        ]);

        $arsip->kategori_id = $request->kategori_id;
        $arsip->nomor_surat = $request->nomor_surat;
        $arsip->judul = $request->judul;

        if ($request->hasFile('file_surat')) {
            $file = $request->file('file_surat');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            $arsip->file_surat = 'uploads/' . $fileName;
        }

        $arsip->save();

        return redirect()->back()->with('success', true); // kirim session flash
    }

    public function show($id)
    {
        $arsip = Arsip::with('kategori')->findOrFail($id);
        return view('arsip.show', compact('arsip'));
    }

    public function destroy($id)
    {
        $arsip = Arsip::findOrFail($id);

        if ($arsip->file_surat && file_exists(public_path($arsip->file_surat))) {
            unlink(public_path($arsip->file_surat));
        }

        $arsip->delete();

        return redirect()->route('arsip.index')->with('success', 'Arsip berhasil dihapus.');
    }
}
