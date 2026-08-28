<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('registration_documents', function (Blueprint $table) {

            // Jenis dokumen
            if (!Schema::hasColumn('registration_documents', 'document_type')) {
                $table->string('document_type')->nullable()->after('registration_id');
            }

            // Nama asli file
            if (!Schema::hasColumn('registration_documents', 'original_name')) {
                $table->string('original_name')->after('document_type');
            }

            // Lokasi file
            if (!Schema::hasColumn('registration_documents', 'file_path')) {
                $table->string('file_path')->after('original_name');
            }

            // Disk penyimpanan
            if (!Schema::hasColumn('registration_documents', 'file_disk')) {
                $table->string('file_disk')->default('public')->after('file_path');
            }

            // MIME type
            if (!Schema::hasColumn('registration_documents', 'mime_type')) {
                $table->string('mime_type')->nullable()->after('file_disk');
            }

            // Ukuran file dalam byte
            if (!Schema::hasColumn('registration_documents', 'file_size')) {
                $table->unsignedBigInteger('file_size')->nullable()->after('mime_type');
            }
        });
    }

    public function down(): void
    {
        Schema::table('registration_documents', function (Blueprint $table) {

            $columns = [
                'document_type',
                'original_name',
                'file_path',
                'file_disk',
                'mime_type',
                'file_size',
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('registration_documents', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};