<?php

use App\Enums\ApprovalTypeEnum;
use App\Enums\ExpertStatusEnum;
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
        Schema::create('approvals', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignUlid('user_id')->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Society::class, 'society_id')->nullable();
            $table->enum('type', ApprovalTypeEnum::values());
            $table->string('commercial_register')->nullable(); // RCCM/RSCPM
            $table->string('single_tax_form')->nullable(); // IFU
            $table->string('geographic_region'); // Country
            $table->string('province');
            $table->string('mailbox')->nullable();
            $table->string('tel')->nullable();
            $table->string('mobile');
            $table->string('fax')->nullable();
            $table->enum('expert_status', ExpertStatusEnum::values());
            $table->boolean('has_been_public_agent')->default(false);
            $table->string('next_view'); // View to render next
            $table->integer('total_steps'); // Total step to complete the form
            $table->integer('current_step')->default(1);
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
