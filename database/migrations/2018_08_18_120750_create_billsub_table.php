<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsubTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billsub', function (Blueprint $table) {
            $table->increments('id');
            $table->string('billsub_code', 15);
			$table->integer('vendor_id')->unsigned();
			$table->enum('status', array('New', 'In progress', 'Completed'))->default('New');
			//$table->integer('status_id')->unsigned();
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamps();
			$table->foreign('vendor_id')->references('id')->on('vendors');
			//$table->foreign('status_id')->references('id')->on('billsub_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billsub');
    }
}
