<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('typeId')->unsigned();
            $table->bigInteger('brandId')->unsigned();
            $table->float('quantity');
            $table->float('price');
            $table->float('value');
            $table->timestamps();

            $table->foreign('typeId')
                ->references('id')
                ->on('types')
                ->onDelete('cascade');
            
            $table->foreign('brandId')
                ->references('id')
                ->on('brands')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
}
