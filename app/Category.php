<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';
	
    /**
     * Set timestamps off
     */
    public $timestamps = false;
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];
	
	public function parent()
    {
        return $this->hasOne('App\Category', 'id', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Category', 'parent_id', 'id');
    }
	
	public function isRoot()
	{
		return $this->parent_id == 0;
	}
	
	public function countChildren()
	{
		return count($this->children);
	}
	
}
