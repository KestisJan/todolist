<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create To Do List') }}
        </h2>
    </x-slot>    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('todo-list.store') }}" method="POST">
                    @csrf

                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">


                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" id="title" class="mt-1 p-2 w-full border rounded-md">
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="4" class="mt-1 p-2 w-full border rounded-md"></textarea>
                        </div>

                        
                        <div class="flex items-center">
                            <button type="submit" class="border hover:bg-blue-300 bg-blue-500 text-black px-4 py-2 rounded-md">Create To-Do List</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>