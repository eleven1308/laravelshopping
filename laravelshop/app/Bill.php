<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';
	protected $fillable = [
      'code_order', 'name', 'email', 'address', 'phone' , 'customer_id' , 'date_order', 'payment', 'status' , 'note' , 'created_at' , 'update_at'	
    ];

    public function user()
    {
    	return $this->belongsTo('App\User' , 'user_id' , 'id');
    }

    public function billdetaill()
    {
    	  return $this->hasOne('App\Bill_Detail', 'bill_id');
    }

}
