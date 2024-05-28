<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
  use HasFactory;

  protected $guarded = [];


  /**
   * Get the attributes that should be cast.
   *
   * @return array<string, string>
   */
  protected function casts(): array
  {
    return [
      'changes' => 'array',
    ];
  }


  public function subject()
  {
    return $this->morphTo();
  }

  public function owner()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
