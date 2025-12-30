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
        Schema::create('organization_details', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->string('cooperative')->nullable();
            $table->string('sub_cooperative')->nullable();
            $table->string('contract')->nullable();
            $table->string('sub_contract')->nullable();
            $table->string('area_of_focous')->nullable();
            $table->string('industry_activity_survey_detail')->nullable();
            $table->string('industry_activity_survey_vision')->nullable();
            $table->boolean('referal')->default(false);
            $table->string('referal_number')->nullable();
            $table->json('data_use')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organization_details');
    }
};
