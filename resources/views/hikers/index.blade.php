<x-app-layout>
    <script type="text/javascript">
        $(document).ready(function (e) {
            $('#profile_img_url').change(function(){
                let reader = new FileReader();
                // Create function to Store Image data in reader when load occurs
                reader.onload = (e) => { 
                    $('#preview-image-before-upload').attr('src', e.target.result); 
                }
                // Load file and attach to html
                reader.readAsDataURL(this.files[0]);
                jQuery("#imagePreview").removeClass('hidden'); 
            
            });
        });
    </script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hiker Info') }}
        </h2>
    </x-slot>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        @if($user->hiker===null)
        <form class="" method="POST" action="{{ route('hiker.store') }}" enctype="multipart/form-data">
        @else
        <form class="" method="POST" action="{{ route('hiker.update') }}" enctype="multipart/form-data">
        @endif
            @csrf
            <label for="trail_name">
                {{__('Trail Name')}}:
            </label>
            <input
                id="hiker_trail_name"
                name="hiker_trail_name"
                value='@unless($user->hiker === null){{$user->hiker->hiker_trail_name}}@endunless'
                placeholder='@if($user->hiker === null){{__("Enter Your Trail Name")}}@endif'
                class="ml-10 p-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            ></input>
            <x-input-error :messages="$errors->get('trail_name')" class="mt-2" />

            <x-input-label for="profile_img_url">
                {{__('Profile Image')}}:
            </x-input-label>
            <div class="flex flex-wrap flex-row">
            @unless($user->hiker === null)
                <div>
                    <span class="p-1 ml-5 block font-medium text-sm text-gray-700">{{__('Current Profile Image')}}</span>
                    <img class="p-1 ml-5 max-h-40 max-w-fit section-about-profile__img" src="{{asset('storage/'.$user->hiker->profile_img_url)}}">
                </div>
                <div id="imagePreview" class="hidden">
                    <span class="p-1 ml-5 block font-medium text-sm text-gray-700">{{__('New Profile Image Preview')}}</span>
                    <img id="preview-image-before-upload" class="p-1 ml-5 max-h-40 max-w-fit section-about-profile__img">
                </div>
            @endunless
            </div>
            <label class="block mb-4">
                <span class="p-1 ml-5 block font-medium text-sm text-gray-700">{{__('File Upload')}}</span>
                <span class="sr-only">{{__('Upload New File')}}</span>
                <input id="profile_img_url"
                name="profile_img_url" type="file"
                accept="image/*"
                class="p-1 ml-5 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                @error('image')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </label>

            <label for="about">
                {{__('About Info Section')}}:
            </label>
            <textarea
                id="hiker_about"
                name="hiker_about"
                placeholder='@if($user->hiker === null){{__("Enter Information About Yourself")}}@endif'
                class="ml-10 p-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >@unless($user->hiker === null){{$user->hiker->hiker_about}}@endunless</textarea>
            <x-input-error :messages="$errors->get('about')" class="mt-2" />
            <x-primary-button class="mt-4">{{$user->hiker === null? __('Create')  : __('Update')  }}</x-primary-button>
        </form>
    </div>
</x-app-layout>