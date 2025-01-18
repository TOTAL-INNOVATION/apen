<?php

use App\Enums\TrainingLevelEnum;
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
        Schema::create('trainings', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('approval_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->enum('level', TrainingLevelEnum::values())->nullable();
            $table->string('level_precision')->nullable();
            $table->year('procured_at');
            $table->string('trainer_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
