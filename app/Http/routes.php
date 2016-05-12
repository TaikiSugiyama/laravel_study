<?php

use App\Task;
use Illuminate\Http\Request;
Route::get('/hello', function () {
    return 'Hello world!';
});
/**
 * 全タスク表示
 */
Route::get('/', function () {
    $tasks = Task::orderBy('created_at', 'desc')->get();
    return view('tasks', [
        'tasks' => $tasks
    ]);
});
/**
 * 新タスク追加
 */
Route::post('task', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);
    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }
    $task = new Task;
    $task->name = $request->name;
    $task->save();//ORM←
    return redirect('/');
});
/**
 * 既存タスク削除
 */
Route::delete('/task/{id}', function ($id) {
    Task::findOrFail($id)->delete();
    return redirect('/');
});

Route::get('/api/tasks', function (){
    $tasks = Task::orderBy('created_at', 'desc')->get();
    $json_data=['result'=>true,'data'=>$tasks];
    return response()->json($json_data);
});

Route::get('/api/tasks/?limit=', function (Request $request){
    $limit = $request->all();
});

