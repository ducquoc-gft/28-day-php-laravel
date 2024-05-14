<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\TodoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::latest()->paginate(5)
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')
    ->name('tasks.create');

Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', [
        'task' => $task
    ]);
})->name('tasks.edit');

Route::get('/tasks/{task}', function (Task $task) {
    return view('show', [
        'task' => $task
    ]);
})->name('tasks.show');

Route::post('/tasks', function (TaskRequest $request) {
    $task = Task::create($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task created successfully!');
})->name('tasks.store');

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
    $task->update($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task updated successfully!');
})->name('tasks.update');

Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();

    return redirect()->route('tasks.index')
        ->with('success', 'Task deleted successfully!');
})->name('tasks.destroy');

Route::put('tasks/{task}/toggle-complete', function (Task $task) {
    $task->toggleComplete();

    return redirect()->back()->with('success', 'Task updated successfully!');
})->name('tasks.toggle-complete');


Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');
Route::get('/todos/list', 'App\Http\Controllers\TodoController@list')->name('todos.list');
Route::view('/todos/create', [TodoController::class, 'create'])->name('todos.create');
Route::get('/todos/{task}/edit', 'App\Http\Controllers\TodoController@edit')->name('todos.edit');
Route::get('/todos/{task}', 'App\Http\Controllers\TodoController@show')->name('todos.show');
Route::post('/todos', 'App\Http\Controllers\TodoController@store')->name('todos.store');
Route::put('/todos/{task}', 'App\Http\Controllers\TodoController@update')->name('todos.update');
Route::post('/todos/{task}', 'App\Http\Controllers\TodoController@destroy')->name('todos.destroy');
Route::put('/todos/{task}/toggle-complete', 'App\Http\Controllers\TodoController@toggleComplete')->name('todos.toggle-complete');

Route::get('api/v1/testnotes', function () {
    // return response()->json(Task::latest()->take(10)->get());
    return response()->json([['id' => '0', 'name' => 'Note 0'], ['id' => '1', 'name' => 'Note 1']]);
});

Route::get('api/v1/testnotes/{id}', function (string $id) {
    // return response()->json(['success' => true]);
    return response()->json(['id' => $id, 'name' => 'Note '.$id]);
});

Route::get('api/v1/mock', function () {
    // return response()->json([['id' => '0', 'name' => 'J-T-D 0'], ['id' => '1', 'name' => 'B-P-D 1']]);
    $jsonData = Illuminate\Support\Facades\Storage::json('mockData.json');
    $shortString = implode(',', array_column($jsonData, 'name'));
    Illuminate\Support\Facades\Log::debug('[json data] ' . '{' . $shortString . '}');
    return $jsonData;
});

Route::missing(function () {
    return 'Not found any bound model. Please check again if missing parameters.';
});

Route::fallback(function () {
    return 'Fallback to default response!';
});
