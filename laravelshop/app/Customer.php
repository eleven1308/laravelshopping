<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
	protected $fillable = [
      'name', 'user_id', 'gender', 'email', 'address' , 'phone_number' , 'note' 	
    ];

    public function user()
    {
    	return $this->belongsTo('App\User' , 'user_id' , 'id');
    }
}
