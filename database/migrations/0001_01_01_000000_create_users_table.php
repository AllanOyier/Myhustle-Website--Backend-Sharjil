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
        Schema::create('users', function (Blueprint $table) {
            $table->string('id')->primary();
            // Common fields
            $table->string('email')->unique();
            $table->string('password');
            $table->string('country');
            $table->string('region');
            $table->string('area');
            $table->string('type_of_enterprice');
            $table->string('mobile_number');
            $table->string('whatsapp_number');
            $table->string('physical_address');
            $table->string('postal_address');
            $table->string('gender')->nullable();
            $table->enum('type_of_user', ['individual', 'organization'])->default('individual'); // 'individual' or 'organization'

            // Individual user fields
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('national_id')->nullable();
            $table->string('national_id_number')->nullable();

            // Organization fields
            $table->string('org_name')->nullable();
            $table->string('org_type')->nullable();
            $table->string('registration_document')->nullable();
            $table->string('registration_number')->nullable();

            $table->rememberToken();
            $table->timestamps();
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
