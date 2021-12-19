<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PriorityMaster;

class PriorityMasterController extends Controller
{
  public function index() {

    return PriorityMaster::all();

  }
}
