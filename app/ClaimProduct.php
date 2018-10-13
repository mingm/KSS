<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClaimProduct extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'claims_product';
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'claim_id', 'product_id', 'type', 'serial_number', 'claim_reason', 'package_bundle'
    ];
	
	public $timestamps = false;
	
	public function product()
    {
        return $this->hasOne('App\Product', 'id', 'product_id');
    }

    public function claim()
    {
        return $this->belongsTo('App\Claim');
    }
}
