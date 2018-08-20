<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'brands';
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'status'
    ];
	
    /**
     * Set timestamps off
     */
    public $timestamps = false;
}
