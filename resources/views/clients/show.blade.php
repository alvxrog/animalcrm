<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles del cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex">    
                    <!-- Datos del cliente -->
                    <div class="w-1/2">
                        <p><strong>Nombre:</strong> {{ $client->name }}</p>
                        <p><strong>Teléfono:</strong> {{ $client->phoneno }}</p>
                        <p><strong>Número de identificación (DNI/NIE):</strong> {{ $client->identifno }}</p>
                        <p><strong>Dirección:</strong> {{ $client->address }}</p>
                        <p><strong>Correo electrónico:</strong> {{ $client->email }}</p>
                        <a href="{{ route('clients.edit', $client->id) }}" 
                        class="inline-block px-4 py-2 bg-yellow-500 text-white text-sm font-medium rounded shadow hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2 transition duration-200">
                            Editar
                        </a>
                        <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="px-4 py-2 bg-red-500 text-white text-sm font-medium rounded shadow hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2 transition duration-200"
                                    onclick="return confirm('Estas seguro de que deseas eliminar el cliente? Todos sus animales y actos clínicos se eliminaran también')">
                                Eliminar
                            </button>
                        </form>
                        <a href="{{ route('clients.index') }}" 
                        class="inline-block px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 transition duration-200">
                        Volver</a>
                    </div>
                    <!-- Animales del cliente-->
                    <div class="w-3/4">
                        <a href="{{ route('animals.create_from_client', $client) }}"
                        class="inline-block px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 transition duration-200">
                        Nuevo animal</a>
                        <p><strong>Animales registrados:</strong></p>
                            <table class="min-w-full border-collapse">
                                <thead class='bg-white text-gray-700'>
                                    <tr>
                                        <th class='px-4 py-2 text-left font-medium'>Nombre</th>
                                        <th class='px-4 py-2 text-left font-medium'>Nº Microchip</th>
                                        <th class='px-4 py-2 text-left font-medium'>Especie</th>
                                        <th class='px-4 py-2 text-left font-medium'>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($client->animals as $animal)
                                        <tr>
                                            <td class="px-4 py-2">{{ $animal->name }}</td>
                                            <td class="px-4 py-2">{{ $animal->microchipno }}</td>
                                            <td class="px-4 py-2">{{ $animal->type }}</td>
                                            <td class="px-4 py-2">
                                                <a href="{{ route('records.create_from_animal', $animal) }}"
                                                class="inline-block px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 transition duration-200">
                                                Nuevo acto clínico</a>
                                                <form action="{{ route('animals.destroy', $animal->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                <button type="submit" 
                                                class="px-4 py-2 bg-red-500 text-white text-sm font-medium rounded shadow hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2 transition duration-200"
                                                onclick="return confirm('Confirma que quieres eliminar este animal')">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        <p><strong>Últimos actos clínicos:</strong></p>
                        <table class="min-w-full border-collapse">
                            <thead class='bg-white text-gray-700'>
                                <tr>
                                    <th class='px-4 py-2 text-left font-medium'>Fecha</th>
                                    <th class='px-4 py-2 text-left font-medium'>Nombre de animal</th>
                                    <th class='px-4 py-2 text-left font-medium'>Nº Microchip</th>
                                    <th class='px-4 py-2 text-left font-medium'>DPS</th>
                                    <th class='px-4 py-2 text-left font-medium'>Acciones</th>
                                </tr>
                            </thead>
                            <tbody class='bg-white'>
                                @foreach($client->records as $record)
                                    <tr class="hover:bg-gray-100">
                                        <td class="px-4 py-2">{{ $record->created_at->format('d-m-Y') }}</td>
                                        <td class="px-4 py-2">{{ $record->animal->name }}</td>
                                        <td class="px-4 py-2">{{ $record->animal->microchipno }}</td>
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
                                                        class="px-4 py-2 bg-red-500 text-white text-sm font-medium rounded shadow hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2 transition duration-200"
                                                        onclick="return confirm('Are you sure?')">
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
