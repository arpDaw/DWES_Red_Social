<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex items-center m-4">
                    <form action="{{route('search')}}" method="get">
                        @csrf
                        <div class="m-4">
                            <form action=""></form>
                            <x-jet-label for="text" value="{{ __('Usuario a buscar') }}" />
                            <x-jet-input id="user" class="block mt-1 w-full" type="text" name="user" required />
                            <x-jet-button class="m-4">
                                {{ __('Buscar') }}
                            </x-jet-button>
                        </div>
                    </form>
                    <br>

                    <div class="resultados flex items-center m-4">
                        @foreach($users as $user)
                            <div class="pfp scale-155">
                                <img src="{{asset('storage/'.$user->profile_photo_path)}}" alt="">
                            </div>
                            <div class="pInfo ml-4">
                                <span>Nombre: {{$user->name}}</span>
                                <br>
                                <span>Nick: {{$user->username}}</span>
                            </div>
                            <div class="bPerfil m-4">
                                <form method="GET" action="{{route('perfil')}}">
                                    <x-jet-button>{{__(('Perfil'))}}</x-jet-button>
                                </form>
                            </div>

                        @endforeach
                    </div>

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
