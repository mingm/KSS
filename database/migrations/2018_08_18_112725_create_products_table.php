<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
			$table->integer('brand_id')->unsigned();
			$table->integer('vendor_id')->unsigned();
            $table->string('name');
            $table->string('model');
            $table->string('description');
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamps();
			$table->foreign('brand_id')->references('id')->on('brands');
			$table->foreign('vendor_id')->references('id')->on('vendors');
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