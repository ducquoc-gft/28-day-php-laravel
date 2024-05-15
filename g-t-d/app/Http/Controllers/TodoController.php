<?php

namespace App\Http\Controllers;

// use Log;

use App\Models\TodoItem;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function index() {

        return view('g-t-d', ['todoItems' => TodoItem::all()->where('is_complete', 0)]);
    }

    public function storeItem(Request $request) {

        // \Log::info(json_encode($request->all()));
        $newTodoItem = new TodoItem();
        $newTodoItem->name = $request->todoItem;
        $newTodoItem->is_complete = 0;
        $newTodoItem->save();

        return redirect('/');
    }

    public function markComplete($id) {

        // \Log::info($id);
        $todoItem = TodoItem::find($id);
        // \Log::info($todoItem);
        $todoItem->is_complete = 1;
        $todoItem->save();

        return redirect('/');
    }
}
