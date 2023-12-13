<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit To-Do List') }}
        </h2>
    </x-slot>    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" id="title" class="mt-1 p-2 w-full border rounded-md" value="{{ old('title', $task->title) }}">
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Tasks</label>
                            <div id="tasks-container">
                                    <div class="flex mb-2">
                                        <input type="text" name="tasks[]" value="{{ $task->description }}" class="mt-1 p-2 w-full border rounded-md">
                                    </div>
                            </div>
                        </div>
                        <div class="mb-2 flex flex-col ">
                                        <label for="status" class="">Status</label>
                                        <select name="status" id="status" class="px-2 py-1  rounded-md">
                                            <option value="in_progress" @if($task->status === 'in_progress') selected @endif>In Progress</option>
                                            <option value="completed" @if($task->status === 'completed') selected @endif>Completed</option>
                                        </select>
                        </div>

                        <div class="mb-4 p-6 flex items-center">
                            <button type="submit" class="border text-black px-4 py-2 rounded-md transition-colors hover:bg-gray-300 hover:text-white">Update To-Do List</button>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>

   
</x-app-layout>
