<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Trails') }}
        </h2>
    </x-slot>

    <!-- TODO Make a card to show trail info -->
    @foreach($user->trails as $trail)
        <div class="max-w-2xl mx-auto mt-6 bg-white shadow-sm rounded-lg divide-y">
            <div class="p-6 flex space-x-2">
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-gray-800">{{ $trail->trail_name }}</span>
                            <small class="ml-2 text-sm text-gray-600">{{$trail->created_at->format('j M Y, g:i a') }}</small>
                        </div>

                        @if ($trail->user->is(auth()->user()))
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link :href="route('trails.edit', $trail)">
                                        {{ __('Edit') }}
                                    </x-dropdown-link>
                                    <form method="POST" action="{{ route('trails.destroy', $trail) }}">
                                        @csrf
                                        @method('delete')
                                        <x-dropdown-link :href="route('trails.destroy', $trail)" onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Delete') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        @endif
                    </div>
                    <p class="mt-4 text-lg text-gray-900">{{ $trail->trail_about }}</p>
                </div>
            </div>
        </div>
    @endforeach

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <a href="{{route('trails.create')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mt-4" >{{__('Add Trail')}}</a>
    </div>
</x-app-layout>