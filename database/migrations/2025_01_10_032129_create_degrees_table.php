<?php

use App\Enums\DegreeLevelEnum;
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
        Schema::create('degrees', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('approval_id')->constrained()->cascadeOnDelete();
            $table->enum('level', DegreeLevelEnum::values());
            $table->string('level_precision');
            $table->integer('years_of_experience');
            $table->year('started_at'); // Year of procurement
            $table->string('file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('degrees');
    }
};
