<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = 'producttype';
    // protected $dates = ['updated_at'];
	protected $fillable = [
        'name', 'slug', 'images', 'status', 'category_id'	
    ];

    public function category()
    {
        return $this->belongsTo('App\Category' , 'category_id' , 'id');
    }
}

