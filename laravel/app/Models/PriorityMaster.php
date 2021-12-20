<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriorityMaster extends Model
{
  use HasFactory;

  protected $table = 'priority_masters';

  protected $fillable = ['name'];

  /**
   * PriorityMasterのtodoを取得
   */
  public function todos()
  {
    return $this->hasMany(Todo::class,'priority_id');
  }
}
