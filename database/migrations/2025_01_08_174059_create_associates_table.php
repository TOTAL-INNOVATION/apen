<?php

use App\Enums\QualificationEnum;
use App\Models\Society;
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
        Schema::create('associates', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignIdFor(Society::class, 'society_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('role'); // In the society
            $table->enum('qualification', QualificationEnum::values());
            $table->string('approval'); // URL to the associate approval file
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('associates');
    }
};
