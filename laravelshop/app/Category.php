<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
	protected $fillable = [
      'name', 'slug', 'status', 'description', 'created_at' , 'update_at' 	
    ];

    public function productType()
    {
    	return $this->hasMany('App\ProductType' , 'category_id' , 'id');
    }
}
