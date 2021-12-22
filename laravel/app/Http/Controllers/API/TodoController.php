<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;

use App\Http\Requests\PostRequest;

class TodoController extends Controller
{
  
  public function index() {

    return Todo::all();

  }

  public function store(PostRequest $request) {

    $todo = Todo::create($request->all());

    return $todo ? response()->json($todo,200) : response()->json([],500);

  }

  public function update(Request $request, Todo $todo) {

    $todo->content = $request->content;
    $todo->priority_id = $request->priority_id;
    $todo->deadline_date = $request->deadline_date;

    $todo->update();

    return $todo ? response()->json($todo,200) : response()->json([],500);
  }

  public function destroy(Request $request, Todo $todo) {

    $todo->delete();

    return $todo ? response()->json($todo,200) : response()->json([],500);
  }
}
