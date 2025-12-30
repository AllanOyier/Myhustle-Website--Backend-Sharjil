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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->string('reciver_id');
            $table->foreign('reciver_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->enum('status', ['paid', 'unpaid'])->default('unpaid');

            $table->enum('invoice_type', ['quotation', 'invoice', 'goods_delivery', 'receipt', 'statement'])->default('invoice')->nullable(false);
            $table->string('description');
            $table->string('e_wallet_number')->nullable();
            $table->string('bank_account_holder_name');
            $table->string('bank_name');
            $table->string('bank_account_number');
            $table->string('bank_branch_number');
            $table->string('bank_swift_code');
            $table->json('data');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
