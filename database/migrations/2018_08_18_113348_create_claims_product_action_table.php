<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaimsProductActionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claims_product_action', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('claim_id')->unsigned();
			$table->integer('claim_product_id')->unsigned();
			$table->enum('status', array('New', 'Transfer to dealer', 'Get back from dealer', 'returned'))->default('New');
			//$table->integer('claim_product_status_id')->unsigned();
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamps();
			$table->foreign('claim_id')->references('id')->on('claims');
			$table->foreign('claim_product_id')->references('id')->on('claims_product');
			//$table->foreign('claim_product_status_id')->references('id')->on('claims_product_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('claims_product_action');
    }
}
