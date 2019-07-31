<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'images';
	protected $fillable = [
      'filename' ,'url_image', 'product_id',  'color_id', 'created_at', 'update_at' 	
    ];
    public $timestamps = false;

    public function products()
    {
        return $this->belongsTo('App\Images' , 'product_id', 'id');
    }

    public function colors()
    {
         return $this->belongsTo('App\Color' , 'color_id' , 'id');
    }

    // public function products()
    // {
    //     return $this->belongsTo('App\Images' , 'product_id', 'id');
    // }
}
