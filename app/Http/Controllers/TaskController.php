<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    function index(Request $request){
        $user = $request->user();
        $tasks = Task::where('user_id', $user->id)->get();
        return view('tasks.tasks');

    }


     function store(Request $request){
        $current_user = $request->user()->id;
        $request->validate([
            'name'=>'required',
            'status'=>'required',
        ]);

        $task= new Task();
        $task->name = $request->name;
        $task->status = $request->status;
        $task->user_id = $current_user;
        $task->save();

        return redirect()->route('tasks.index');
     }
}
