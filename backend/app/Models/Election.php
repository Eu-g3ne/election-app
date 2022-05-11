<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
  use HasFactory;

  protected $fillable = [
    'post',
    'status',
    'started_at',
    'finished_at'
  ];

  public $timestamps = false;

  public function candidates()
  {
    return $this->belongsToMany(Candidate::class);
  }

  public function voters()
  {
    return $this->belongsToMany(Voter::class)->using(ElectionVoter::class)->withPivot('candidate_id');
  }
}
