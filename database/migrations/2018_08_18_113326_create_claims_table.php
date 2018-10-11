<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claims', function (Blueprint $table) {
            $table->increments('id');
            $table->string('claim_code', 15);
			$table->integer('customer_id')->unsigned();
			$table->enum('status', array('New', 'In Progress', 'Completed'))->default('New');
			//$table->integer('claim_status_id')->unsigned();
            $table->string('note');
            $table->string('created_by');
			$table->dateTime('created_at');
			$table->foreign('customer_id')->references('id')->on('customers');
			//$table->foreign('claim_status_id')->references('id')->on('claims_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('claims');
    }
}
