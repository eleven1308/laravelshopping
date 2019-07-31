<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill_Detail extends Model
{
    protected $table = 'bill_detail';
	protected $fillable = [
      'bill_id', 'product_id', 'quantity', 'unit_price', 'created_at' , 'update_at' 	
    ];
    
    public function bill()
    {
    	return $this->belongsTo('App\Bill' , 'bill_id' , 'id');
    }

    public function product()
    {
    	return $this->belongsTo('App\Product', 'product_id', 'id');
    }

}
