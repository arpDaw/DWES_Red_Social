
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('MiPerfil') }}
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

    <div class="py-12">
        <div class="flex gap-10  mx-auto sm:px-6 lg:px-8">
            <div class="panelSolicitudes">
                @if(count($solicitudes) > 0) {{-- Comprueba si hay solicitudes pendientes --}}
                <div>
                    <h1>Solicitudes pendientes:</h1>
                </div>
                @foreach($solicitudes as $solicitud)

                    @if($solicitud->recipient_id === auth()->user()->id)
                        <div>
                        <img src="{{asset('storage/'.$usuarios->where('id', '=', $solicitud->sender_id)->first()->profile_photo_path)}}" alt="">
                        <span>{{$usuarios->where('id', '=', $solicitud->sender_id)->first()->username}}</span>
                        <br>
                            <form action="{{route('acceptFriend')}}" method="POST">
                                @csrf
                                <input type="hidden" name="sender" value="{{$solicitud->sender_id}}">
                                <x-jet-button>Aceptar Solicitud</x-jet-button>
                            </form>
                            <form action="{{route('denyFriend')}}" method="POST">
                                @csrf
                                <input type="hidden" name="sender" value="{{$solicitud->sender_id}}">
                                <x-jet-button>Cancelar Solicitud</x-jet-button>
                            </form>
                     </div>
                            @endif
                @endforeach
                @else
                    <div>
                        <h1>No hay solicitudes pendientes</h1>
                    </div>
                @endif

                @if(count($amigos) > 0)
                        <div>
                        <h1>Amigos:</h1>
                    @foreach($amigos as $amigo)
                        <div>

                            <img src="{{asset('storage/'.$amigo->profile_photo_path)}}" alt="">
                            <span>{{$amigo->name}}</span>

                        </div>
                        @endforeach
                        </div>
                    @endif

            </div>
            <div class="bg-white max-w-7xl overflow-hidden shadow-xl sm:rounded-lg">

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
                                <form action="{{route('deleteImage', $image->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
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
