<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
  use HasFactory;

  protected $table = 'todos';

  protected $fillable = ['content','deadline_date','priority_id'];

  /**
   * Todoに紐づくPriorityMasterを取得
   */
  public function priority_master()
  {
    return $this->belongsTo(PriorityMaster::class,'priority_id');
  }
}
