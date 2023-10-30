<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Pacientes') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 min-h-[740px]">

                    <div class="mb-5 flex flex-row-reverse w-full basis-10">
                        <x-primary-link-button class="" href="{{ route('patient.create') }}">
                            {{ __('Novo Paciente') }}
                        </x-primary-link-button>

                    </div>

                    <table class="table md:table-auto table-fixed w-full text-center border-solid">
                        <thead>
                            <tr class="border-solid border-0 border-b border-slate-700">
                                <th class="">ID</th>
                                <th class="">Nome</th>
                                <th class="">Email</th>
                                <th class="">Telefone</th>
                            </tr>
                        </thead>

                        <tbody class="h-10">
                            @foreach ($patients as $patient)
                                <tr class="border-solid border-0 border-b border-slate-700 last:border-transparent">
                                    <td>{{ $patient->id }}</td>
                                    <td>{{ $patient->name }} {{ $patient->surname }}</td>
                                    <td>{{ $patient->email }}</td>
                                    <td>{{ $patient->phone }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if (count($patients) >= 10)
                        <div class="mt-5 flex flex-row-reverse w-full basis-10">
                            <x-primary-link-button class="" href="{{ route('patient.create') }}">
                                {{ __('Novo Paciente') }}
                            </x-primary-link-button>
                        </div>
                    @endif

                    {{ $patients->links() }}


                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>