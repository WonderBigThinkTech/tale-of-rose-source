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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('SKU');
            $table->string('description'); 
            
            $table->decimal('price', 10, 2);
            $table->integer('quantity');
            $table->integer('sold_amount')->default(0);
            $table->string('box_material');    
            $table->string('box_content');       
            $table->string('box_dimension_inner');
            $table->string('box_dimension_outer');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
