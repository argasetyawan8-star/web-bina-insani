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
        // Pastikan tabel tersedia
        if (!Schema::hasTable('registration_documents')) {
            return;
        }

        // Tambahkan kolom yang belum tersedia
        Schema::table('registration_documents', function (Blueprint $table) {

            if (!Schema::hasColumn('registration_documents', 'document_type')) {
                $table->string('document_type')
                    ->nullable()
                    ->after('registration_id');
            }

            if (!Schema::hasColumn('registration_documents', 'original_name')) {
                $table->string('original_name')
                    ->after('document_type');
            }

            if (!Schema::hasColumn('registration_documents', 'file_path')) {
                $table->string('file_path')
                    ->after('original_name');
            }

            if (!Schema::hasColumn('registration_documents', 'file_disk')) {
                $table->string('file_disk')
                    ->default('public')
                    ->after('file_path');
            }

            if (!Schema::hasColumn('registration_documents', 'mime_type')) {
                $table->string('mime_type')
                    ->nullable()
                    ->after('file_disk');
            }

            if (!Schema::hasColumn('registration_documents', 'file_size')) {
                $table->unsignedBigInteger('file_size')
                    ->nullable()
                    ->after('mime_type');
            }
        });

        // Pastikan index registration_id + document_type tersedia
        Schema::table('registration_documents', function (Blueprint $table) {

            // Kita tidak membuat index secara otomatis di sini
            // untuk menghindari duplicate index pada database
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Sengaja tidak menghapus kolom.
        //
        // Migration ini berfungsi sebagai compatibility/fix migration
        // untuk menyamakan struktur database development dengan aplikasi.
    }
};