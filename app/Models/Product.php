<?php

namespace App\Models;

use \Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
    	'name', 'slug', 'desc', 'image', 'content', 'category_id',
      'price', 'price_market', 'guarantee', 'numbers', 'high_light',
    	'set_title', 'meta_key', 'meta_desc', 'view'
    ];

    public function category() {
    	return $this->belongsTo('App\Models\Category');
    }

    public function albums () {
        return $this->hasMany('App\Models\Album', 'product_id');
    }

    public function orders () {
    	return $this->hasMany('App\Models\Order');
    }

    public function setSlugAttribute ( $string ) {
    	$slug = str_slug( $string );
    	$this->attributes['slug'] = $slug;
    }

    public function getCreatedAtAttribute( $value ) {
    	return Carbon::parse($value)->format('d/m/Y H:i');
    }

    // public function setPriceDifferentAttribute( $price_different ) {
    //     $different_price = json_encode($price_different);
    //     return $this->attributes['price_different'] = $different_price;
    // }

    // public function getPriceDifferentAttribute( $price_different ) {
    //     return json_decode($price_different, true);
    // }

    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("name", "LIKE","%$keyword%")
                    ->orWhere("meta_key", "LIKE", "%$keyword%")
                    ->orWhere("meta_desc", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }
}
