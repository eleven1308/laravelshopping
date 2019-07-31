<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'size';
    // protected $guarded = [];
	protected $fillable = [
        'number_size', 'quantily','description', 'created_at', 'update_at' 	
    ];
    // public $timestamps = false;

    public function product()
    {
    	return $this->belongsToMany('App\Product', 'size_product', 'size_id', 'product_id');
    }
}
