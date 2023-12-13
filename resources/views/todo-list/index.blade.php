<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('To Do List') }}
        </h2>
        <div class="p-6 text-gray-900">
            <x-third-button routeName="tasks.create" :userId="$user->id">
                Create To Do List
            </x-third-button>
        </div>
    </x-slot>    

    <div class="container mx-auto p-6">
        @forelse($groupedTasks as $title => $tasks)
        @foreach($tasks as $task)
        @if(auth()->user()->id === $task->user_id)
        <div class="mb-4 bg-white border border-gray-400 text-center">
            <h2 class="font-semibold text-xl text-black-800 leading-tight">
                Title: {{ $title }}
            </h2>
            <div class="flex -mx-4">
                        <div class="flex-1 p-4">
                            <div class="flex-6 p-2">
                                <div class="p-4 flex flex-wrap items-center justify-end">
                                <form id="delete-form-{{ $task->id }}" action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="flex items-center px-2 py-1 mx-1 tracking-wide text-xl mb-2 border border-gray-400 rounded-md">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                                        </svg>
                                    </button>
                                </form>
                                    <a href="{{ route('tasks.edit', $task->id) }}" class="px-2 py-1 mx-1 tracking-wide text-xl mb-2 border border-gray-400 rounded-md">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                            <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2 2 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                                            <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="block bg-white overflow-hidden border-3 h-full">
                                    <div class="p-4" style="
                                        @if($task->status == 'in_progress') border: 3px solid #ADC5CF; background-color:#FEFEDF; @endif
                                        @if($task->status == 'completed') border: 2px solid green; @endif
                                    ">
                                        <div id="descriptions-container" class="mb-2 text-center">
                                            <p class="text-md text-justify text-xl">
                                                Description: {{ $task->description }}
                                            </p>
                                            @if($task->status === 'in_progress')
                                                <p class="text-md text-justify text-xl">
                                                    Status: In Progress
                                                </p>
                                            @elseif($task->status === 'completed')
                                                <p class="text-md text-justify text-xl" style="color: green;">
                                                    Status: Completed
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @endforeach
            </div>
        </div>
        @empty
            <p>No tasks available.</p>
        @endforelse
    </div>
</x-app-layout>
