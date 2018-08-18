<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaimsProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claims_product', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('claim_id')->unsigned();
			$table->integer('product_id')->unsigned();
            $table->string('type');
            $table->string('serial_number');
            $table->string('claim_reason');
            $table->string('package_bundle');			
			$table->foreign('claim_id')->references('id')->on('claims');
			$table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('claim_product');
    }
}
