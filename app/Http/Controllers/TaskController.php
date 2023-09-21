<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function deleteTask(Task $task){
        if(auth()->user()->id === $task['user_id']){
            $task->delete();
        }
        return redirect('/');
    }

    public function createTask(Request $request){
        $data = $request->validate([
            'title' => 'required',
        ]);

        $data['title'] = strip_tags($data['title']);
        $data['user_id'] = auth()->id();
        Task::create($data);
        return redirect('/');
    }
}
