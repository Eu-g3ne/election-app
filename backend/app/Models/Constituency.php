<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Constituency extends Model
{
  use HasFactory;

  protected $fillable = [
    'region',
    'email',
    'phone',
    'address',
    'total_voters',
  ];

  public $timestamps = false;

  public function registrations()
  {
    return $this->hasMany(Registration::class);
  }
}
