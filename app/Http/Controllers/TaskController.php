<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;
use App\Models\Todo;
use App\Models\User;

class TaskController extends Controller
{
    public function create($userId)
    {
        $user = User::findOrFail($userId);

        return view('tasks.create', compact('user'));
    }


   
    
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'tasks' => 'array|required',
        ]);
    
        $user_id = $request->input('user_id');
        $title = $request->input('title');
        $tasks = $request->input('tasks');
    
        foreach ($tasks as $task) {
            Tasks::create([
                'user_id' => $user_id,
                'title' => $title,
                'description' => $task,
            ]);
        }
    
    
        return redirect()->route('todo-list.index');
    }


    public function edit($id)
    {
        $task = Tasks::findOrFail($id);

        $user = User::find($task->user_id);
    
        return view('tasks.edit', compact('task', 'user'));
    }


   
    public function update(Request $request, $id)
    {
    $request->validate([
        'user_id' => 'required',
        'title' => 'required',
        'tasks' => 'array|required',
        'status' => 'required', 
    ]);

    $user_id = $request->input('user_id');
    $title = $request->input('title');
    $tasks = $request->input('tasks');
    $status = $request->input('status');
    foreach ($tasks as $taskId => $taskDescription) {
        $task = Tasks::find($id);

        if ($task) {
            $task->update([
                'user_id' => $user_id,
                'title' => $title,
                'description' => $taskDescription,
                'status' => $status,
            ]);
        } else {
            abort(404);
        }
    }

    return redirect()->route('todo-list.index');

    }
    
    public function destroy($id)
    {
    $task = Tasks::find($id);

    if ($task) {
        $task->delete();
        return redirect()->route('todo-list.index');
    } else {
        return redirect()->route('todo-list.index');
    }

    }   
    
   
}
