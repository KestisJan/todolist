<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create To Do List') }}
        </h2>
    </x-slot>    

    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 text-center">

                <form action="{{ route('todo-list.destroy', $todo->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                    <p class="mb-4">Are you sure you want to delete {{ $todo->title }} completely?</p>

                    <div class="flex space-x-2 justify-center">
                        <button type="submit" class="border bg-red-500 text-white px-4 py-2 rounded-md">Yes, Delete</button>
                        <a href="{{ route('todo-list.index') }}" class="border hover:bg-blue-300 bg-blue-500 text-black px-4 py-2 rounded-md">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


</x-app-layout>