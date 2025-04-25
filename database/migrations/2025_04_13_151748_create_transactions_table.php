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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')
                ->constrained('customers', 'id')
                ->onDelete('restrict');

            $table->foreignId('payment_method_id')
                ->nullable()
                ->constrained('payment_methods', 'id')
                ->onDelete('restrict');

            $table->decimal('amount', 10, 2);

            $table->string('currency')->nullable();
            $table->foreign('currency')                
                ->references('value')
                ->on('currencies')
                ->onDelete('restrict');

            $table->decimal('fee', 10, 2)->nullable();
            $table->decimal('total', 10, 2)->nullable();
            $table->string('status'); 
            $table->json('metadata'); 
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
