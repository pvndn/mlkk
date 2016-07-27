<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Transaction extends Model
{
  protected $table = 'transactions';
  protected $fillable = ['name', 'email', 'phone', 'address', 'messages', 'amount', 'status'];
  protected $dates = ['created_at'];

  public function getCreatedAtAttribute($value) {
    return Carbon::parse($value)->format('d/m/Y H:i');
  }
  public function orders() {
    return $this->hasMany('\App\Models\Order');
  }
}
