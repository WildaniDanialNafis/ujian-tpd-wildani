<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('arsip', function (Blueprint $table) {
            $table->id('id_arsip');

            // Foreign key kategori_id
            $table->unsignedBigInteger('kategori_id');

            // Kolom data arsip
            $table->string('nomor_surat', 255)->nullable();
            $table->string('judul', 255)->nullable();
            $table->text('file_surat')->nullable();
            $table->timestamps();

            // Foreign key constraint dengan cascade
            $table->foreign('kategori_id')
                ->references('id_kategori')  // sesuaikan dengan primary key di tabel kategori
                ->on('kategori')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('arsip', function (Blueprint $table) {
            // Drop foreign key terlebih dahulu sebelum drop table
            $table->dropForeign(['kategori_id']);
        });
        Schema::dropIfExists('arsip');
    }
};
