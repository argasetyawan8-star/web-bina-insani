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
        Schema::create('registration_documents', function (Blueprint $table) {
            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Registration
            |--------------------------------------------------------------------------
            */

            $table->foreignId('registration_id')
                ->constrained('registrations')
                ->cascadeOnDelete();

            /*
            |--------------------------------------------------------------------------
            | Document
            |--------------------------------------------------------------------------
            */

            $table->string('document_type')->nullable();
            $table->string('original_name');
            $table->string('file_path');
            $table->string('file_disk')->default('public');
            $table->string('mime_type')->nullable();
            $table->unsignedBigInteger('file_size')->nullable();

            $table->timestamps();

            /*
            |--------------------------------------------------------------------------
            | Index
            |--------------------------------------------------------------------------
            */

            $table->index([
                'registration_id',
                'document_type',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration_documents');
    }
};