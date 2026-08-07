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
        Schema::create('registrations', function (Blueprint $table) {

            $table->id();

            $table->foreignId('program_id')
                ->constrained()
                ->cascadeOnDelete();

            /*
            |--------------------------------------------------------------------------
            | Biodata
            |--------------------------------------------------------------------------
            */

            $table->string('full_name');
            $table->string('nik', 20)->unique();

            $table->string('birth_place');
            $table->date('birth_date');

            $table->enum('gender', [
                'Laki-laki',
                'Perempuan'
            ]);

            $table->string('phone');
            $table->string('email')->nullable();

            $table->text('address');

            $table->string('education')->nullable();
            $table->string('job')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Dokumen
            |--------------------------------------------------------------------------
            */

            $table->string('photo')->nullable();
            $table->string('ktp')->nullable();
            $table->string('ijazah')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Pendaftaran
            |--------------------------------------------------------------------------
            */

            $table->string('registration_code')->unique();

            $table->enum('status', [
                'pending',
                'verified',
                'rejected'
            ])->default('pending');

            /*
            |--------------------------------------------------------------------------
            | Pembayaran Manual
            |--------------------------------------------------------------------------
            */

            $table->enum('payment_method', [
                'qris',
                'transfer'
            ])->nullable();

            $table->enum('payment_status', [
                'unpaid',
                'waiting_verification',
                'paid',
                'rejected'
            ])->default('unpaid');

            $table->string('payment_proof')->nullable();

            $table->timestamp('paid_at')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Admin
            |--------------------------------------------------------------------------
            */

            $table->boolean('cs_contacted')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};