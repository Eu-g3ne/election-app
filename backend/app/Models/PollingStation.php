<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollingStation extends Model
{
  use HasFactory;

  protected $fillable = [
    'address',
    'city',
    'phone',
    'total_voters'
  ];

  public $timestamps = false;

  public function registrations()
  {
    return $this->hasMany(Registration::class);
  }
}
