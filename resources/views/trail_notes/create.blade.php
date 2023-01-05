<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Trail Note') }}
        </h2>
    </x-slot>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form class="space-y-1" method="POST" action="{{ route('trail_notes.store') }}">
            @csrf
            <x-input-label for="trails_id">
                {{__('Trail ID')}}:
            </x-input-label>
            <select class="p-1 w-full ml-5" name="trails_id" id="trails_id">
                @foreach($user->trails as $trail)
                    <option value="{{$trail->id}}">{{$trail->trail_name}}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('trails_id')" class="mt-2" />

            <x-input-label for="hike_date">
                {{__('Hike Date')}}:
            </x-input-label>
            <input type="date" id="hike_date" name="hike_date" class="p-1 w-full ml-5" min="1900-01-01" max="2200-12-31" pattern="\d{4}-\d{2}-\d{2}">
            <x-input-error :messages="$errors->get('hike_date')" class="mt-2" />

            <x-input-label for="direction_type">
                {{__('Direction')}}:
            </x-input-label>
            <select class="p-1 w-full ml-5" name="direction_type" id="direction_type">
                <option value="nobo">{{__('NoBo')}}</option>
                <option value="sobo">{{__('SoBo')}}</option>
                <option value="flipflop">{{__('FlipFlop')}}</option>
            </select>
            <x-input-error :messages="$errors->get('direction_type')" class="mt-2" />

            <x-input-label for="start_mile_marker">
                {{__('Starting Mile Marker')}}:
            </x-input-label>
            <x-text-input
                id="start_mile_marker"
                name="start_mile_marker"
                type="number"
                placeholder='{{__("Enter the starting mile marker.")}}'
                class="p-1 w-full ml-5"
            ></x-text-input>
            <x-input-error :messages="$errors->get('start_mile_marker')" class="mt-2" />

            <x-input-label for="start_elevation">
                {{__('Starting Elevation')}}:
            </x-input-label>
            <x-text-input
                id="start_elevation"
                name="start_elevation"
                type="number"
                placeholder='{{__("Enter the starting elevation.")}}'
                class="p-1 w-full ml-5"
            ></x-text-input>
            <x-input-error :messages="$errors->get('start_elevation')" class="mt-2" />

            <x-input-label for="start_location">
                {{__('Starting Location')}}:
            </x-input-label>
            <x-text-input
                id="start_location"
                name="start_location"
                type="string"
                placeholder='{{__("Enter the starting location.")}}'
                class="p-1 w-full ml-5"
            ></x-text-input>
            <x-input-error :messages="$errors->get('start_location')" class="mt-2" />

            <x-input-label for="end_mile_marker">
                {{__('Ending Mile Marker')}}:
            </x-input-label>
            <x-text-input
                id="end_mile_marker"
                name="end_mile_marker"
                type="number"
                placeholder='{{__("Enter the ending mile marker.")}}'
                class="p-1 w-full ml-5"
            ></x-text-input>
            <x-input-error :messages="$errors->get('end_mile_marker')" class="mt-2" />

            <x-input-label for="end_elevation">
                {{__('Ending Elevation')}}:
            </x-input-label>
            <x-text-input
                id="end_elevation"
                name="end_elevation"
                type="number"
                placeholder='{{__("Enter the ending elevation.")}}'
                class="p-1 w-full ml-5"
            ></x-text-input>
            <x-input-error :messages="$errors->get('end_elevation')" class="mt-2" />

            <x-input-label for="end_location">
                {{__('Ending Location')}}:
            </x-input-label>
            <x-text-input
                id="end_location"
                name="end_location"
                type="string"
                placeholder='{{__("Enter the ending location.")}}'
                class="p-1 w-full ml-5"
            ></x-text-input>
            <x-input-error :messages="$errors->get('end_location')" class="mt-2" />

            <x-input-label for="slackpacked">
                {{__('Did you Slackpack?')}}:
            </x-input-label>
            <x-text-input
                id="slackpacked"
                name="slackpacked"
                type="checkbox"
                class="p-1 w-full ml-5"
            ></x-text-input>
            <x-input-error :messages="$errors->get('slackpacked')" class="mt-2" />

            <x-input-label for="blaze_type">
                {{__('Blaze Type')}}:
            </x-input-label>
            <select class="p-1 w-full ml-5" name="blaze_type" id="blaze_type">
                <option value="white">{{__('White')}}</option>
                <option value="blue">{{__('Blue')}}</option>
                <option value="pink">{{__('Pink')}}</option>
                <option value="yellow">{{__('Yellow')}}</option>
                <option value="aqua">{{__('Aqua')}}</option>
            </select>
            <x-input-error :messages="$errors->get('blaze_type')" class="mt-2" />

            <x-input-label for="camp_type">
                {{__('Camp Type')}}:
            </x-input-label>
            <select class="p-1 w-full ml-5" name="camp_type" id="camp_type">
                <option value="tent">{{__('Tent')}}</option>
                <option value="shelter">{{__('Shelter')}}</option>
                <option value="hammock">{{__('Hammock')}}</option>
                <option value="cowboy">{{__('Cowboy')}}</option>
                <option value="building">{{__('Building')}}</option>
            </select>
            <x-input-error :messages="$errors->get('camp_type')" class="mt-2" />

            <x-input-label for="shower">
                {{__('Did you Shower?')}}:
            </x-input-label>
            <x-text-input
                id="shower"
                name="shower"
                type="checkbox"
                class="p-1 w-full ml-5"
            ></x-text-input>
            <x-input-error :messages="$errors->get('shower')" class="mt-2" />

            <x-input-label for="bed">
                {{__('Did you sleep in a Bed?')}}:
            </x-input-label>
            <x-text-input
                id="bed"
                name="bed"
                type="checkbox"
                class="p-1 w-full ml-5"
            ></x-text-input>
            <x-input-error :messages="$errors->get('bed')" class="mt-2" />

            <x-input-label for="mood_scale">
                {{__('Mood Scale')}}:
            </x-input-label>
            <x-text-input
                id="mood_scale"
                name="mood_scale"
                type="number"
                placeholder='{{__("Enter your mood 1-10, 10 being happy")}}'
                class="p-1 w-full ml-5"
            ></x-text-input>
            <x-input-error :messages="$errors->get('mood_scale')" class="mt-2" />

            <x-input-label for="trail_notes">
                {{__('Trail Notes')}}:
            </x-input-label>
            <textarea
                id="trail_notes"
                name="trail_notes"
                placeholder='{{__("Enter notes about the day")}}'
                class="p-1 ml-5 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            ></textarea>
            <x-input-error :messages="$errors->get('trail_notes')" class="mt-2" />
            <br/>
            <x-primary-button class="mt-4">{{__('Create Trail Note')}}</x-primary-button>
        </form>
    </div>
</x-app-layout>