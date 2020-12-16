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
            $table->string('slug')->unique();

            // Foreign keys
            $table->unsignedBigInteger('category_id')->nullable();            
            $table->foreign('category_id')->references('id')
                  ->on('categories')->onUpdate('cascade')->onDelete('set null');
            $table->unsignedBigInteger('subcategory_id')->nullable();            
            $table->foreign('subcategory_id')->references('id')
                  ->on('categories')->onUpdate('cascade')->onDelete('set null');

            // Product Fields
            $table->string('ime');
            $table->string('proizvodjac');
            $table->string('pakovanje')->nullable();
            $table->boolean('dostupnost')->default(true);

            $table->integer('cena');

            $table->unsignedBigInteger('action_id')->nullable();            
            $table->foreign('action_id')->references('id')
                  ->on('actions')->onUpdate('cascade')->onDelete('set null');

            $table->integer('popust')->nullable()->default(null);


            $table->text('opis');
            $table->text('image')->nullable();
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
