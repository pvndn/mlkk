<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
  protected $table = 'partners';

  protected $fillable = [
    'name', 'slug', 'logo', 'desc', 'category_id', 'link'
  ];

  public function category () {
    return $this->belongsTo('App\Models\Category');
  }

  public function setSlugAttribute ( $string ) {
    $slug = str_slug( $string );
    $this->attributes['slug'] = $slug;
  }
}
