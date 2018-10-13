<?php

namespace App;

use App\ClaimProductAction;
use Illuminate\Database\Eloquent\Model;

class ClaimProduct extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'claims_product';
	
	public $timestamps = false;
	
	public function product()
    {
        return $this->hasOne('App\Product', 'id', 'product_id');
    }

    public function claim()
    {
        return $this->belongsTo('App\Claim');
    }
	
	public function claimProductActions() {
        return $this->hasMany('App\ClaimProductAction');
	}
	
	public function latestClaimProductAction() {
		
		$query = ClaimProductAction::select();
		$query->where('claim_id', $this->claim_id);
		$query->where('claim_product_id', $this->id);
		
		$claimProductAction = ClaimProductAction::find($query->max('id'));
		
        return $claimProductAction;
	}
}
