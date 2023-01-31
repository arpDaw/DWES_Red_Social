<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perfil') }}
        </h2>
    </x-slot>
    <div class="user-header">
        <div class="userhandle grid grid-cols-3">
            <div class="userhandle_name col-span-3 bg-gray-400 text-center">
                <p>{{auth()->user()->username}}</p>
            </div>
            <div class="userhandle_img text-center">
                <img src="{{asset('storage/'.auth()->user()->profile_photo_path)}}" alt="">
            </div>

        </div>

    </div>


    <x-guest-layout>
        <x-jet-authentication-card>
            <x-slot name="logo">
                <x-jet-authentication-card-logo />
            </x-slot>

            <x-jet-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
        </x-jet-authentication-card>
    </x-guest-layout>




    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

            </div>
        </div>
    </div>
</x-app-layout>
