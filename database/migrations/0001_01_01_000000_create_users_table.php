<?php

use App\Enums\GenderEnum;
use App\Enums\MaritalStatusEnum;
use App\Enums\RoleEnum;
use App\Models\User;
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
        Schema::create('users', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->enum('role', RoleEnum::values());
            $table->string('firstname');
            $table->string('lastname');
            $table->string('phone')->nullable();
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('avatar')->default(User::DEFAULT_AVATAR);
            $table->boolean('added_by_admin')->default(false);
            $table->date('birthday')->nullable();
            $table->string('birthplace')->nullable();
            $table->enum('gender', GenderEnum::values())->nullable();
            $table->enum('marital_status', MaritalStatusEnum::values())->nullable();
            $table->string('identity_photo')->nullable(); // URL to identity photo
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->unique(['email', 'phone']);
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
