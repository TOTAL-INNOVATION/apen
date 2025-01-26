<?php

use App\Enums\TransactionStatusEnum;
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
        Schema::create('transactions', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('approval_id')->constrained()->cascadeOnDelete();
            $table->string('token'); // Transaction token
            $table->string('amount');
            $table->string('phone');
            $table->string('otp');
            $table->boolean('is_sub')->default(false);
            $table->enum('status', TransactionStatusEnum::values())
            ->default(TransactionStatusEnum::PENDING->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
