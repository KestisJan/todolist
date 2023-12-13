<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $tasks = Tasks::all();
        $groupedTasks = $tasks->groupBy('title');
        return view('todo-list.index', compact('user', 'tasks', 'groupedTasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todo-list.create');
    }

    /**
    

    
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = auth()->user();
        return view('todo-list.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }


    public function delete(string $id)
    {
        $user = auth()->user();
        return view('todo-list.delete', compact('todo'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $user = auth()->user();

        // if ($user->id === $todo->user_id) {
        //     $todo->delete();
        //     return redirect()->route('todo-list.index');
        // }
    }
}
