<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex items-center mt-4">
                    <form action="" method="get">
                        @csrf
                        <div class="m-4">
                            <x-jet-label for="text" value="{{ __('Usuario a buscar') }}" />
                            <x-jet-input id="user" class="block mt-1 w-full" type="text" name="user" required />
                            <x-jet-button class="m-4">
                                {{ __('Buscar') }}
                            </x-jet-button>
                        </div>
                    </form>

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
