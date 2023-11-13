@php
    $isEdit = $patient->id ? true : false;

    $header = $isEdit ? 'Editar Paciente' : 'Novo Paciente';
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
                        <x-primary-link-button class="" href="{{ route('patient.index') }}">
                            {{ __('Voltar') }}
                        </x-primary-link-button>
                    </div>

                    <form method="POST" action="{{ $isEdit ? url("pacientes/$patient->id") : url("pacientes") }}">
                        
                        @csrf

                        @method($isEdit ? 'PATCH' : 'post')

                        <input type="hidden" name="id" value="{{ $patient->id }}">

                        <div class="mb-3">
                            <div class="flex w-full space-x-5 mb-2">
        
                                <div class="w-1/2">
                                    <x-input-label for="name" :value="__('Nome')" />
                                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" placeholder="Nome" :value="old('name', $patient->name)" required autofocus autocomplete="name" />
                                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                </div>
        
                                <div class="w-1/2">
                                    <x-input-label for="surname" :value="__('Sobrenome')" />
                                    <x-text-input id="surname" name="surname" type="text" class="mt-1 block w-full" placeholder="Sobrenome" :value="old('surname', $patient->surname)" required autofocus autocomplete="surname" />
                                    <x-input-error class="mt-2" :messages="$errors->get('surname')" />
                                </div>
        
                            </div>
    
                            <div class="flex w-full space-x-5 mb-2">
        
                                <div class="w-1/2">
                                    <x-input-label for="cpf" :value="__('CPF')" />
                                    <x-text-input id="cpf" name="cpf" type="text" placeholder="CPF" class="mt-1 block w-full" :value="old('cpf', $patient->cpf)" required autofocus autocomplete="cpf" />
                                    <x-input-error class="mt-2" :messages="$errors->get('surname')" />
                                </div>
    
                                <div class="w-1/2">
                                    <x-input-label for="phone" :value="__('Telefone')" />
                                    <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $patient->phone)" placeholder="Telefone" required autofocus autocomplete="phone" />
                                    <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                                </div>
        
                            </div>
    
                            <div class="flex w-full space-x-5">
        
                                <div class="w-1/2">
                                    <x-input-label for="birth_date" :value="__('Data de nascimento')" />
                                    <x-text-input id="birth_date" name="birth_date" type="date" class="mt-1 block w-full" :value="old('birth_date', $patient->birth_date)" required autofocus autocomplete="birth_date"/>
                                    <x-input-error class="mt-2" :messages="$errors->get('surname')" />
                                </div>
                                
                                <div class="w-1/2">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $patient->email)" placeholder="Email" required autofocus autocomplete="email" />
                                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
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