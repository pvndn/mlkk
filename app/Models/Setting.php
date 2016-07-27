<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';
    protected $fillable = ['option_key', 'option_value', 'type'];

    public $timestamps = false;

    public function setOptionKeyAttribute ( $string ) {
    	$slug = str_slug( $string );
    	$option_key = str_replace( '-', '_', $slug );
    	$this->attributes['option_key'] = $option_key;
    }

    public function getOptionKeyAttribute ( $string ) {
    	return $this->attributes['option_key'] = snake_case($string);
    }

}
