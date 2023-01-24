<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>



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

        <form method="POST" action="{{ route('uploaded') }}" enctype="multipart/form-data">
            @csrf
            <div class="mt-4">
                <x-jet-label for="text" value="{{ __('description') }}" />
                <x-jet-input id="description" class="block mt-1 w-full" type="text" name="description" required />
            </div>
            <div class="mt-4">
                <x-jet-label for="file" value="{{ __('image') }}" />
                <x-jet-input id="image" class="block mt-1 w-full" type="file" name="image" required />
            </div>

            <div class="flex items-center justify-end mt-4">
            <x-jet-button class="ml-4">
                {{ __('Upload') }}
            </x-jet-button>
            </div>
        </form>

    </x-jet-authentication-card>
</x-guest-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

            </div>
        </div>
    </div>
</x-app-layout>
