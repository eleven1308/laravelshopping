<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'color';
	protected $fillable = [
      'name', 'description', 'created_at', 'update_at' 	
    ];
    // public $timestamps = false;
    
    public function product()
    {
    	return $this->belongsToMany('App\Product', 'color_product', 'color_id', 'product_id');
    }

    public function images()
    {
    	return $this->hasMany('App\Images' , 'color_id' , 'id');
    }

}
