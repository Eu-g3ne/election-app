<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
  use HasFactory;

  protected $fillable = [
    'entry_date',
    'mandate_number',
    'party_id'
  ];

  public $timestamps = false;

  public function party()
  {
    return $this->belongsTo(Party::class);
  }

  public function candidate()
  {
    return $this->belongsTo(Candidate::class);
  }
}
