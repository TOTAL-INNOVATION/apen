<?php

use App\Enums\{ActivitySectorEnum, ApprovalTypeEnum, ExpertStatusEnum};
use App\Enums\ApprovalStatusEnum;
use App\Enums\StatusInSectorEnum;
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
        Schema::create('approvals', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('user_id')->constrained()->cascadeOnDelete();
            $table->enum('type', ApprovalTypeEnum::values());
            $table->string('commercial_register')->nullable(); // RCCM/RSCPM
            $table->string('country_of_residence')->nullable();
            $table->string('single_tax_form')->nullable(); // IFU
            $table->string('geographic_region')->nullable(); // Country
            $table->string('region')->nullable();
            $table->string('address')->nullable(); // Required if country !== Burkina Faso
            $table->string('province')->nullable();
            $table->string('mailbox')->nullable();
            $table->string('tel')->nullable();
            $table->string('website')->nullable();
            $table->string('mobile')->nullable();
            $table->string('fax')->nullable();
            $table->enum('expert_status', ExpertStatusEnum::values())->nullable();
            $table->boolean('has_been_public_agent')->default(false);
            $table->integer('total_sectors')->nullable(); // Total domains
            $table->string('association')->nullable();
            $table->enum('category', ['A', 'B', 'C'])->nullable(); // For approval of type C only
            $table->enum('activity_sector', ActivitySectorEnum::values())->nullable(); // For approval of type C only
            $table->enum('status_in_sector', StatusInSectorEnum::values())->nullable(); // For approval of type C only
            $table->string('view')->nullable(); //Next view
            $table->integer('total_steps'); // Total step to complete the form
            $table->integer('current_step')->default(1);
            $table->string('signature')->nullable(); // Signature file path
            $table->string('cv')->nullable();
            $table->enum('status', ApprovalStatusEnum::values())
            ->default(ApprovalStatusEnum::IN_PROGRESS->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approvals');
    }
};
