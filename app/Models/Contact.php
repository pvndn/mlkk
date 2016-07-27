<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon;

class Contact extends Model
{
  protected $table = 'contacts';

  protected $fillable = [ 'name', 'email', 'phone', 'product', 'status', 'body' ];


  public function getCreatedAtAttribute( $value ) {
  	return Carbon::parse($value)->diffForHumans();
  }

}
