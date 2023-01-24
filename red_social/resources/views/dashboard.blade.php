<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex items-center mt-4">
                    <x-jet-button class="ml-4 mb-4"><a class="" href="{{route('upload-image')}}">upload-image</a></x-jet-button>

                </div>
                <div class="flex items-center mt-4">
                    @foreach($images as $image)
                        {{$image->user->name.' '}}
                        {{$image->description}} <br>
                        <img src="{{asset('images_rrss/'.$image->image_path)}}" alt="">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
