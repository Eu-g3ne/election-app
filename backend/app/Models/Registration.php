<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
  use HasFactory;

  protected $fillable = [
    'country',
    'city',
    'address',
    'polling_station_id',
    'constituency_id'
  ];

  public $timestamps = false;

  public function constituency()
  {
    return $this->belongsTo(Constituency::class);
  }

  public function pollingStation()
  {
    return $this->belongsTo(PollingStation::class);
  }

  public function voter()
  {
    return $this->belongsTo(Voter::class);
  }
}
