<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    
   	protected $table = 'albums';

    protected $fillable = [ 'photo', 'product_id' ];

    public function products () {
    	return $this->belongsTo('App\Models\Product');
    }
}
