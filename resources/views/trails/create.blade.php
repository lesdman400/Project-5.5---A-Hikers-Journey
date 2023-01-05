<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Trail Info') }}
        </h2>
    </x-slot>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form class="space-y-1" method="POST" action="{{ route('trails.store') }}" enctype="multipart/form-data">
            @csrf
            <x-input-label for="trail_name">
            {{__('Trail Name') }}:
            </x-input-label>
            <x-text-input
                id="trail_name"
                name="trail_name"
                placeholder='{{__("Enter Your Trail Name")}}'
                class="p-1 w-full ml-5"
            ></x-text-input>
            <x-input-error :messages="$errors->get('trail_name')" class="mt-2" />

            <x-input-label for="trail_start_date">
                {{__('Trail Start Date')}}:
            </x-input-label>
            <input type="date" id="trail_start_date" name="trail_start_date" class="p-1 w-full ml-5" min="1900-01-01" max="2200-12-31" pattern="\d{4}-\d{2}-\d{2}">
            <x-input-error :messages="$errors->get('trail_start_date')" class="mt-2" />

            <x-input-label for="trail_end_date">
                {{__('Trail Start Date')}}:
            </x-input-label>
            <input type="date" id="trail_end_date" name="trail_end_date" class="p-1 w-full ml-5" min="1900-01-01" max="2200-12-31" pattern="\d{4}-\d{2}-\d{2}">
            <x-input-error :messages="$errors->get('trail_end_date')" class="mt-2" />

            <x-input-label for="trail_about">
            {{__('About Info Section') }}:
            </x-input-label>
            <textarea
                id="trail_about"
                name="trail_about"
                placeholder='{{__("Enter Information About Yourself")}}'
                class="p-1 ml-5 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            ></textarea>
            <x-input-error :messages="$errors->get('trail_about')" class="mt-2" />
         
            <x-input-label for="trail_about_img_url">
            {{__('Trail About Image') }}:
            </x-input-label>
            <label class="block mb-4">
                <span class="sr-only">{{__('Choose File') }}</span>
                <input id="trail_about_img_url"
                name="trail_about_img_url" type="file"
                accept="image/*"
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                @error('image')
                <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </label>

            <x-input-label for="instagram_url">
            {{__('Instagram URL') }}:
            </x-input-label>
            <x-text-input
                id="instagram_url"
                name="instagram_url"
                placeholder='{{__("Enter Your Instagram URL")}}'
                class="p-1 w-full ml-5"
            ></x-text-input>
            <x-input-error :messages="$errors->get('instagram_url')" class="mt-2" />

            <!-- <x-input-label for="instagram_map_img_url">
                Instagram Map URL:
            </x-input-label>
            <x-text-input
                id="instagram_map_img_url"
                name="instagram_map_img_url"
                placeholder='{{__("Enter Your Instagram Map URL")}}'
                class="p-1 w-full ml-5"
            ></x-text-input> -->

            <x-input-label for="fitbit_url">
            {{__('Fitbit URL') }}:
            </x-input-label>
            <x-text-input
                id="fitbit_url"
                name="fitbit_url"
                placeholder='{{__("Enter Your Fitbit url")}}'
                class="p-1 w-full ml-5"
            ></x-text-input>
            <x-input-error :messages="$errors->get('fitbit_url')" class="mt-2" />

            <x-input-label for="lighter_pack_url">
            {{__('Lighter Pack URL') }}:
            </x-input-label>
            <x-text-input
                id="lighter_pack_url"
                name="lighter_pack_url"
                placeholder='{{__("Enter Your Lighter Pack URL")}}'
                class="p-1 w-full ml-5"
            ></x-text-input>
            <x-input-error :messages="$errors->get('lighter_pack_url')" class="mt-2" />

            <x-input-label for="garming_map_url">
                {{__('Garmin Map URL')}}:
            </x-input-label>
            <x-text-input
                id="garming_map_url"
                name="garming_map_url"
                placeholder='{{__("Enter Your Garmin Map URL")}}'
                class="p-1 w-full ml-5"
            ></x-text-input>
            <x-input-error :messages="$errors->get('garming_map_url')" class="mt-2" />

            <br/>
            <x-primary-button class="mt-4">{{__('Add Trail')}}</x-primary-button>
        </form>
    </div>
</x-app-layout>