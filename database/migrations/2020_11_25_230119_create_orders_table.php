<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('suma');
            $table->unsignedInteger('status')->default(1);
            $table->string('ime');
            $table->string('prezime')->nullable();
            $table->string('email')->nullable();
            $table->string('telefon');
            $table->string('adresa');
            $table->string('grad');
            $table->text('napomene');
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
        Schema::dropIfExists('orders');
    }
}
