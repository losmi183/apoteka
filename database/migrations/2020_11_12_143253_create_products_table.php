<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('category_id')->nullable();            
            $table->foreign('category_id')->references('id')
                  ->on('categories')->onUpdate('cascade')->onDelete('set null');


            $table->unsignedBigInteger('subcategory_id')->nullable();            
            $table->foreign('subcategory_id')->references('id')
                  ->on('categories')->onUpdate('cascade')->onDelete('set null');





            $table->string('ime');
            $table->string('proizvodjac');
            $table->string('akcija');
            $table->string('pakovanje');
            $table->boolean('dostupnost')->default(true);
            $table->integer('cena');
            $table->text('opis');
            $table->text('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
