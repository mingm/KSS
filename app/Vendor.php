<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'vendors';
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'details', 'phone'
    ];
	
    /**
     * Set timestamps off
     */
    public $timestamps = false;
}
