<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
  use HasFactory;

  protected $fillable = [
    'surname',
    'name',
    'patronymic',
    'birthday',
    'education',
    'passport',
    'activity',
  ];

  public $timestamps = false;

  public function contract()
  {
    return $this->hasOne(Contract::class);
  }

  public function elections()
  {
    return $this->belongsToMany(Election::class);
  }

  public function scopeViaParty($query, Party $party)
  {
    return $query->whereRelation('contract', 'party_id', $party->id);
  }

  public function scopeViaElection($query, Election $election)
  {
    return $query->whereHas('elections', function ($q) use ($election) {
      $q->where('id', $election->id);
    });
  }
}
