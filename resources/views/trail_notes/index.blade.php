<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Trail Notes') }}
        </h2>
    </x-slot>

    @if(Session::has('message'))
        <div id="alert" class="flex p-4 mb-4 bg-{{ Session::get('alert-class', 'alert-info') }}-100 rounded-lg dark:bg-{{ Session::get('alert-class', 'alert-info') }}-200" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-{{ Session::get('alert-class', 'alert-info') }}-700 dark:text-{{ Session::get('alert-class', 'alert-info') }}-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-medium text-{{ Session::get('alert-class', 'alert-info') }}-700 dark:text-{{ Session::get('alert-class', 'alert-info') }}-800">
                {{ Session::get('message') }}
            </div>
            <button type="button" onclick="document.getElementById('alert').remove();" class="ml-auto -mx-1.5 -my-1.5 bg-{{ Session::get('alert-class', 'alert-info') }}-100 text-{{ Session::get('alert-class', 'alert-info') }}-500 rounded-lg focus:ring-2 focus:ring-{{ Session::get('alert-class', 'alert-info') }}-400 p-1.5 hover:bg-{{ Session::get('alert-class', 'alert-info') }}-200 inline-flex h-8 w-8 dark:bg-{{ Session::get('alert-class', 'alert-info') }}-200 dark:text-{{ Session::get('alert-class', 'alert-info') }}-600 dark:hover:bg-{{ Session::get('alert-class', 'alert-info') }}-300" data-dismiss-target="#alert" aria-label="Close">
                <span class="sr-only">{{ __('Close')}}</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
    @endif
    @if($user)
        @forelse($user->trails as $trail)
        <div class="max-w-2xl mx-auto ml mt-6 bg-white shadow-sm rounded-lg divide-y">
                    <h1 class="max-w-2xl ml-2 mx-auto mt-6">{{__($trail->trail_name)}}</h1>
                    @forelse($user->trailnotes->where('trails_id', $trail->id) as $trailNote)
                        <div class="p-6 flex space-x-2">
                            <div class="flex-1">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <span class="text-gray-800">Log Book Entry: {{ $loop->index+1 }} -</span>
                                        <small class="ml-2 text-sm text-gray-600">{{$trailNote->hike_date }}</small>
                                    </div>
                                    @if ($user->is(auth()->user()))
                                        <!-- <img style="width:20px;height:40px;" src="/Images/Blazes/{{$trailNote->blaze_type}}.png" alt="Italian Trulli"> -->
                                        <x-dropdown>
                                            <x-slot name="trigger">
                                                <button>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    </svg>
                                                </button>
                                            </x-slot>
                                            <x-slot name="content">
                                                <x-dropdown-link :href="route('trail_notes.edit', ['trailNotes'=>$trailNote,'trail'=> $trail, 'user' => $user])">
                                                    {{ __('Edit') }}
                                                </x-dropdown-link>
                                                <form method="POST" action="{{ route('trail_notes.destroy', $trailNote) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <x-dropdown-link :href="route('trail_notes.destroy', $trailNote)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                        {{ __('Delete') }}
                                                    </x-dropdown-link>
                                                </form>
                                            </x-slot>
                                        </x-dropdown>
                                    @endif
                                </div>
                                <p class="mt-4 text-lg text-gray-900">{{ $trailNote->trail_notes }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="p-6 flex space-x-2">You have not added any notes for this Trail!</p>
                    @endforelse
                </div>
                    @if($loop->last)
                        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                            <a href="{{route('trail_notes.create')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mt-4" >{{__('Create Trail Note')}}</a>
                        </div>
                    @endif
                @empty
                <p class="p-6 flex space-x-2">You have not added any Trails! Please Add a trail first before you create any Trail Notes</p>
                @endforelse           
    @endif
</x-app-layout>