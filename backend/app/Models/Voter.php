<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
  use HasFactory;

  protected $fillable = [
    'surname',
    'name',
    'patronymic',
    'birthday',
    'birthplace',
    'inn',
    'passport',
  ];

  public $timestamps = false;

  public function elections()
  {
    return $this->belongsToMany(Election::class)->using(ElectionVoter::class)->withPivot('candidate_id');
  }

  public function registration()
  {
    return $this->hasOne(Registration::class);
  }
}
