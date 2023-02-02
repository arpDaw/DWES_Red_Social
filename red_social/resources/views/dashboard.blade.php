<x-app-layout>
    <x-slot name="header">
        <script defer src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script defer src="resources/js/like.js"></script>
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

                <div class="flex flex-row flex-col items-center mt-4">
                    @foreach($images as $image)
                        <div class="basis-1/2 w-full">
                            {{$image->user->name.' '}}
                            {{$image->description}} <br>
                            <img src="{{asset('images_rrss/'.$image->image_path)}}" alt="">
                            <br>
                            {{$images->links()}}
                            Subido hace: {{$carbon->parse($image->created_at)->longAbsoluteDiffForHumans()}}
                            <br>
                            <div class="w-10">
                                <img id="corason" src="images/Heart.svg" alt="corason">
                            </div>

                            <p>Número de comentarios: {{count($image->comments)}}</p>
                            <p>Número de likes: {{count($image->likes)}}</p>
                            @foreach($comments as $comment)
                                @if($image->id == $comment->image_id)


                                <div>
                                    "{{$comment->content}}" - Escrito por:
                                    @foreach($users as $user)
                                        @if($user->id == $comment->user_id)
                                            <div class="hidden">{{ $commentAuthor = $user->username}}</div>
                                        @endif
                                    @endforeach
                                            {{$commentAuthor}} Fecha: {{($comment->created_at)}}
                                    @if($image->user_id == auth()->user()->id)
                                        <form action="{{route('delete-comment')}}" method="POST">
                                            @csrf
                                            <input type="text" class="hidden" name="aBorrar" value="{{$comment->id}}">
                                            <x-jet-button>Eliminar comentario</x-jet-button>
                                        </form>

                                    @endif
                                </div>
                                @endif
                            @endforeach


                        </div>
                        <div class="w-full">
                            <form method="POST"  action="{{ route('upload-comment') }}"}}>
{{--                                action="{{ route('upload-comment') }}"--}}
                                @csrf


                                <textarea name="content" id="content" cols="100" rows="10" value="{{ __('content') }}"></textarea>
                                <input type="hidden" name="image_id" value="{{$image->id}}">
                                <br>
                                <x-jet-button class="ml-4">
                                    {{ __('Upload') }}
                                </x-jet-button>
                            </form>
                        </div>


                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
