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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('type_document');
            $table->foreign('type_document')                
                ->references('value')
                ->on('document_types')
                ->onDelete('restrict');

            $table->string('number_document')->unique();
            $table->string('name');
            $table->string('email');
            $table->json('preferences'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
