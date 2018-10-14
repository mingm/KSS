<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsubProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billsub_product', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('billsub_id')->unsigned();
			$table->integer('claim_id')->unsigned();
			$table->integer('claim_product_id')->unsigned();
			$table->foreign('billsub_id')->references('id')->on('billsub');
			$table->foreign('claim_id')->references('id')->on('claims');
			$table->foreign('claim_product_id')->references('id')->on('claims_product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billsub_product');
    }
}
