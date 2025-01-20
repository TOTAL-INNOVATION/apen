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
        Schema::create('certificates', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('approval_id')->constrained()->cascadeOnDelete();
            $table->string('subject');
            $table->date('starts_at');
            $table->date('ends_at');
            $table->string('location');
            $table->string('trainer_name'); // Institution/Structure/Trainer
            $table->string('file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
