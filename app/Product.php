<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand_id', 'vendor_id', 'name', 'model', 'description', 'created_by', 'updated_by'
    ];
}