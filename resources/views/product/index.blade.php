<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-11xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />    
            </div>
        </div>
        {{-- <x-form-section >
            <x-slot name="title">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Inicio') }}
                </h2>
            </x-slot>
            <x-slot name="description">
                <p class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Inicio') }}
                </p>
            </x-slot>
            <x-slot name="submit">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('route('sale.store')') }}
                </h2>
            </x-slot>
        
        </x-form-section> --}}
</x-app-layout>
