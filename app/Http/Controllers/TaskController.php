<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::orderBy('order')->orderBy('id')->get();//並び順から取得
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request){

        $request->validate([
        'title' => 'required|max:255'
        ]);

        $maxOrder = Task::max('order') ?? 0;

        Task::create([
            'title' => $request->title,
            'infomation' => $request->infomation,
            'status' => 0,
            'order' => $maxOrder + 1
            ]);

        return redirect('/');
    }
    
    public function update(Request $request, Task $task){
        $task->update([
            'status' => $request->status
        ]);

        return redirect('/');
    }

    public function reorder(Request $request)
{
    foreach ($request->all() as $item) {
        Task::where('id', $item['id'])
            ->update(['order' => $item['order']]);
    }

    return response()->json(['status' => 'ok']);
}

}
