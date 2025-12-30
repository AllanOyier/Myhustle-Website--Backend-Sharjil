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
        Schema::create('job_leads', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->string('to_name');
            $table->string('to_mobile');
            $table->string('to_email');
            $table->string('from_name');
            $table->string('from_mobile');
            $table->string('from_email');
            $table->string('title');
            $table->string('date');
            $table->string('time');
            $table->string('location');
            $table->string('description');
            $table->string('rate');
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('from_time');
            $table->string('to_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_leads');
    }
};
