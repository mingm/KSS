<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{	
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'claims';
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id', 'status', 'note', 'created_by'
    ];
	
	public $timestamps = false;
	
	public function claimProducts() {
        return $this->belongsToMany('App\ClaimProduct', 'claim_product');
	}

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }
}