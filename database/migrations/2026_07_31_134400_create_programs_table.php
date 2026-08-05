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
    Schema::create('programs', function (Blueprint $table) {
        $table->id();

        $table->string('name');
        $table->decimal('registration_fee', 12, 2);
        $table->decimal('training_fee', 12, 2);

        $table->string('training_days');
        $table->string('training_hours');
        $table->string('duration');

        $table->text('description');

        $table->boolean('is_active')->default(true);

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
