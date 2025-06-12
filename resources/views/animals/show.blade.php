<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ver animal') }}
        </h2>
    </x-slot>
        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex">    
                    <!-- Datos del cliente -->
                    <div class="w-1/2">
                        <p><strong>Datos del cliente</strong></p>
                        <p><strong>Nombre:</strong> {{ $animal->client->name }}</p>
                        <p><strong>Teléfono:</strong> {{ $animal->client->phoneno }}</p>
                        <p><strong>Número de identificación (DNI/NIE):</strong> {{ $animal->client->identifno }}</p>
                        <p><strong>Dirección:</strong> {{ $animal->client->address }}</p>
                        <p><strong>Correo electrónico:</strong> {{ $animal->client->email }}</p>
                        <a href="{{ route('clients.show', $animal->client) }}" 
                        class="inline-block px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 transition duration-200">
                        Volver</a>
                    </div>
                    <div class="w-1/2">
                        <p><strong>Datos del animal</strong></p>
                        <p><strong>Nombre:</strong> {{ $animal->name }}</p>
                        <p><strong>Nº microchip:</strong> {{ $animal->microchipno }}</p>
                    </div>
                    <!-- Animales del cliente-->
                    <div class="w-3/4">
                        <p><strong>Últimos actos clínicos de {{ $animal->name }}:</strong></p>
                        <table class="min-w-full border-collapse">
                            <thead class='bg-white text-gray-700'>
                                <tr>
                                    <th class='px-4 py-2 text-left font-medium'>Fecha</th>
                                    <th class='px-4 py-2 text-left font-medium'>DPS</th>
                                    <th class='px-4 py-2 text-left font-medium'>Acciones</th>
                                </tr>
                            </thead>
                            <tbody class='bg-white'>
                                @foreach($animal->records as $record)
                                    <tr class="hover:bg-gray-100">
                                        <td class="px-4 py-2">{{ $record->created_at->format('d-m-Y') }}</td>
                                        <td class="px-4 py-2">{{ $record->dps }}</td>
                                        <td class="px-4 py-2">
                                            <a href="{{ route('records.show', $record->id) }}" 
                                            class="inline-block px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 transition duration-200">
                                                Ver
                                            </a>
                                            <a href="{{ route('records.edit', $record->id) }}" 
                                            class="inline-block px-4 py-2 bg-yellow-500 text-white text-sm font-medium rounded shadow hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2 transition duration-200">
                                                Editar
                                            </a>
                                            <form action="{{ route('records.destroy', $record->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="inline-block px-4 py-2 bg-red-500 text-white text-sm font-medium rounded shadow hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2 transition duration-200"
                                                        onclick="return confirm('Estas segura de que quieres eliminar el acto clínico? Esta acción no es reversible y se eliminará para siempre')">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>