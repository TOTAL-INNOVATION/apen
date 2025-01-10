<?php

use App\Enums\LegalStatusEnum;
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
        Schema::create('societies', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('approval_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('commercial_name');
            $table->year('founded_at');
            $table->string('capital'); // of the society
            $table->enum('legal_status', LegalStatusEnum::values()); // SARL, SA, etc.
            $table->string('status_file'); // Legal status file
            $table->string('staff_number');
            $table->integer('salaried_technical_staff'); // Number of
            $table->integer('salaried_administrative_staff');  // Number of
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('societies');
    }
};
