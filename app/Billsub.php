<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billsub extends Model
{

	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'billsub';
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vendor_id', 'status', 'created_by', 'updated_by'
    ];
	
}
