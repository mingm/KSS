<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customers';	
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'first_name', 'last_name', 'address', 'phone', 'note', 'created_by', 'updated_by'
    ];
}
