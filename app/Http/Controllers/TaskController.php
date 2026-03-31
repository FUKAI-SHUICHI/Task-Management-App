<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::all();//DBから取得
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request){
        Task::create([
            'title' => $request->title,
            'infomation' => $request->infomation,
            'status' => 0
            ]);

        return redirect('/');
    }
    
    public function update(Request $request, Task $task){
        $task->update([
            'status' => $request->status
        ]);

        return redirect('/');
    }

}
