<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-center items-center py-6">
                        <a href="{{ route('clients.create') }}" 
                        class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-300">
                            Crear nuevo cliente
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form method="GET" action="{{ route('clients.index') }}" class="mb-4">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar por nombre o teléfono" class="p-2 border rounded">
                        <button type="submit" class="p-2 bg-blue-500 text-white rounded">Buscar</button>

                        @if(request('search'))
                            <a href="{{ route('clients.index') }}" class="p-2 bg-red-500 text-white rounded">Reiniciar</a>
                        @endif
                    </form>
                    <table class="min-w-full border-collapse">
                        <thead class='bg-white text-gray-700'>
                            <tr>
                                <th class='px-4 py-2 text-left font-medium'>Nº Ficha</th>
                                <th class='px-4 py-2 text-left font-medium'>Nombre</th>
                                <th class='px-4 py-2 text-left font-medium'>Nº Identif.</th>
                                <th class='px-4 py-2 text-left font-medium'>Teléfono</th>
                                <th class='px-4 py-2 text-left font-medium'>Acciones</th>
                            </tr>
                        </thead>
                        <tbody class='bg-white'>
                            @foreach($clients as $client)
                                <tr>
                                    <td class="px-4 py-2">{{ $client->id }}</td>
                                    <td class="px-4 py-2">{{ $client->name }}</td>
                                    <td class="px-4 py-2">{{ $client->identifno }}</td>
                                    <td class="px-4 py-2">{{ $client->phoneno }}</td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('clients.show', $client->id) }}" 
                                        class="inline-block px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 transition duration-200">
                                            Ver
                                        </a>
                                        <a href="{{ route('clients.edit', $client->id) }}" 
                                        class="inline-block px-4 py-2 bg-yellow-500 text-white text-sm font-medium rounded shadow hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2 transition duration-200">
                                            Editar
                                        </a>
                                        <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="px-4 py-2 bg-red-500 text-white text-sm font-medium rounded shadow hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2 transition duration-200"
                                                    onclick="return confirm('Confirma que quieres eliminar este cliente')">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $clients->appends(['search' => request('search')])->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
