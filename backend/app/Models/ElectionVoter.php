<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ELectionVoter extends Pivot
{
  public $timestamps = false;
  public $incrementing = true;
}
