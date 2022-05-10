<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
    'created_at',
    'leader',
  ];

  public $timestamps = false;

  public function contracts()
  {
    return $this->hasMany(Contract::class);
  }
}
