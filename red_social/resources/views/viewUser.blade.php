<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('viewUser') }}
        </h2>
    </x-slot>
    <div class="user-header">
        <div class="userhandle grid grid-cols-3">
            <div class="userhandle_name col-span-3 bg-gray-400 text-center">
                <p>{{$user->username}}</p>
            </div>
            <div class="userhandle_img text-center">
                <img src="{{asset('storage/'.$user->profile_photo_path)}}" alt="">
            </div>

        </div>

    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex items-center m-4">
                    @foreach($images as $image)
                        <div class="basis-1/2">

                            <img src="{{asset('images_rrss/'.$image->image_path)}}" alt="">
                            <br>
                            {{$image->user->name.' '}}
                            {{$image->description}} <br>

                            Subido hace: {{$carbon->parse($image->created_at)->longAbsoluteDiffForHumans()}}
                            <br>
                            @if($image->user_id === Auth::id())
                                <form action="{{route('deleteImage')}}">
                                    <x-jet-button class="m-4">Eliminar</x-jet-button>
                                </form>
                            @endif
                            @endforeach

                        </div>
                </div>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                </div>
            </div>
        </div>
</x-app-layout>
