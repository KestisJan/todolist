<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create To-Do-List') }}
        </h2>
    </x-slot>    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('tasks.store') }}" method="POST">
                        @csrf

                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" id="title" class="mt-1 p-2 w-full border rounded-md">
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Tasks</label>
                            <div id="tasks-container">
                                
                            </div>
                            <button type="button" onclick="addTaskInput()" class="border hover:bg-blue-300 bg-blue-500 text-black px-4 py-2 rounded-md">Add Task</button>
                        </div>

                        <div class="flex items-center">
                            <button type="submit" class="border hover:bg-blue-300 bg-blue-500 text-black px-4 py-2 rounded-md">Create To-Do List</button>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        let taskIdCounter = 0;

        function addTaskInput() {
            const tasksContainer = document.getElementById('tasks-container');

            const newTaskDiv = document.createElement('div');
            const taskId = 'task_' + taskIdCounter++; // Unique task ID
            newTaskDiv.id = taskId;
            newTaskDiv.className = 'flex mb-2';

            const newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.name = 'tasks[]';
            newInput.placeholder = 'Enter task';
            newInput.className = 'mt-1 p-2 w-full border rounded-md';

            const deleteButton = document.createElement('button');
            deleteButton.type = 'button';
            deleteButton.textContent = 'Delete';
            deleteButton.className = 'ml-2 px-4 py-2 border text-red-500 hover:bg-red-300 bg-red-200 rounded-md';
            deleteButton.onclick = function () {
                tasksContainer.removeChild(newTaskDiv);
            };

            newTaskDiv.appendChild(newInput);
            newTaskDiv.appendChild(deleteButton);

            tasksContainer.appendChild(newTaskDiv);
        }
    </script>
</x-app-layout>
