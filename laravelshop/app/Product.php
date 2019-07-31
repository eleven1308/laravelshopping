<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
	protected $fillable = [
     'name', 'slug', 'title', 'description', 'images', 'trademark', 'util_price', 'promotion_price', 'status', 'like', 'is_hot' , 'all_views', 'created_by','update_by', 'views', 'materials' , 'category_id' , 'producttype_id' , 'created_at', 'update_at' 	
    ];
    // public $timestamps = false;

    public function images()
    {
        return $this->hasMany('App\Images', 'product_id', 'id');
    }
    public function color()
    {
    	return $this->belongsToMany('App\Color', 'color_product', 'product_id', 'color_id');
    }

    public function size()
    {
    	return $this->belongsToMany('App\Size', 'size_product', 'product_id', 'size_id');
    }

    public function productType()
    {
        return $this->belongsTo('App\ProductType' , 'producttype_id' , 'id');
    }
    
    public function category()
    {
        return $this->belongsTo('App\Category' , 'category_id' , 'id');
    }


}
