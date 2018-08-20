<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillsubProduct extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'billsub_product';
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'billsub_id', 'product_id', 'serial_number'
    ];
	
	public $timestamps = false;
}
