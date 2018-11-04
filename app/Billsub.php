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
	
	public function billsubProducts() {
        return $this->hasMany('App\BillsubProduct');
	}
	
	public function allReturned() {
		
		foreach ($this->billsubProducts as $billsubProduct)
		{
			if ($billsubProduct->claimProduct->latestClaimProductAction()->status === 'Transfer to dealer')
				return false;
		}		
		return true;
	}
	
	public function vendor()
    {
        return $this->hasOne('App\Vendor', 'id', 'vendor_id');
    }
	
}
