<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar cliente') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('clients.update', $client->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $client->name) }}">
                            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $client->email) }}">
                            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="identifno" class="form-label">DNI/NIF/NIE*</label>
                            <input type="text" name="identifno" id="identifno" class="form-control" value="{{ old('identifno', $client->identifno) }}">
                            @error('identifno') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Dirección</label>
                            <input type="address" name="address" id="address" class="form-control" value="{{ old('address', $client->address) }}">
                            @error('address') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phoneno" class="form-label">Número de teléfono</label>
                            <input type="tel" name="phoneno" id="phoneno" class="form-control" value="{{ old('phoneno', $client->phoneno) }}">
                            @error('phoneno') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
