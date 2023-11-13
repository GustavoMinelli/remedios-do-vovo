@php
    $isEdit = $medicine->id ? true : false;

    $header = $isEdit ? 'Editar Remédio' : 'Novo Remédio';
@endphp


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $header }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="mb flex flex-row-reverse w-full basis-10">
                        <x-primary-link-button class="" href="{{ route('medicine.index') }}">
                            {{ __('Voltar') }}
                        </x-primary-link-button>
                    </div>

                    <form method="POST" action="{{ url('remedios') }}">

                        @csrf
                        
                        @method($isEdit ? 'put' : 'post')

                        <input type="hidden" value="{{ $medicine->id }}">

                        <div class="mb-3">
                            <div class="flex w-full space-x-5 mb-2">

                                <div class="w-1/2">
                                    <x-input-label for="name" :value="__('Nome')" />
                                    <x-text-input name="name" type="text" class="mt-1 block w-full" placeholder="Nome" :value="old('name', $medicine->name)" required autofocus autocomplete="name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div>

                                <div class="w-1/2">
                                    <x-input-label for="type" :value="__('Tipo do Remédio')" />
                                    <x-text-input name="type" type="text" class="mt-1 block w-full" placeholder="Tipo" :value="old('surname', $medicine->type)" required autofocus autocomplete="surname" />
                                    <x-input-error class="mt-2" :messages="$errors->get('type')" />
                                </div>

                            </div>

                        </div>

                        <x-primary-button>Cadastrar</x-primary-button>

                    </form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
