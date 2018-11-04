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
		
	public $timestamps = false;

    public function billsub()
    {
        return $this->belongsTo('App\Billsub');
    }
	
	public function claim()
	{
		return $this->hasOne('App\Claim', 'id', 'claim_id');
	}
	
	public function claimProduct()
	{
		return $this->hasOne('App\ClaimProduct', 'id', 'claim_product_id');
	}
}
