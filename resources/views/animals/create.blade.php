<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nuevo animal') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <h1>Detalles del cliente</h1>
                <p><strong>Nombre:</strong> {{ $client->name }}</p>
                <p><strong>Nº identificacion (DNI/NIE):</strong> {{ $client->identifno }}</p>
                <p><strong>Correo electrónico:</strong> {{ $client->email }}</p>

                <!-- Display Validation Errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <h1>Detalles del animal</h1>
                <!-- Form Start -->
                <form action="{{ route('animals.store')}}" method="POST">
                    @csrf
                    @if(isset($animal))
                        @method('PUT')
                    @endif

                    <!-- ClientID -->
                    <input type="hidden" name="client_id" value="{{ $client->id }}">

                    <!-- UserID -->
                    <input type="hidden" name="user_id" value="{{ $client->user->id }}">

                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">Nombre<span class="text-danger">*</span>:</label>
                        <input type="text" name="name" id="name" class="form-control" 
                            value="{{ old('name', isset($animal) ? $animal->name : '') }}" required>
                    </div>

                    <!-- Microchip no-->
                    <div class="form-group">
                        <label for="microchipno">Nº de microchip<span class="text-danger">*</span>:</label>
                        <input type="text" name="microchipno" id="microchipno" class="form-control" 
                            value="{{ old('microchipno', isset($animal) ? $animal->microchipno : '') }}" required>
                    </div>

                    <!-- Species -->
                    <div class="form-group">
                        <label for="type">Especie<span class="text-danger">*</span>:</label>
                        <select name="type" id="type" class="form-control" required>
                            <option value="">Selecciona una opción</option>
                            <option value="Dog" {{ old('type', isset($animal) ? $animal->type : '') == 'Dog' ? 'selected' : '' }}>Perro</option>
                            <option value="Cat" {{ old('type', isset($animal) ? $animal->type : '') == 'Cat' ? 'selected' : '' }}>Gato</option>
                            <option value="Bird" {{ old('type', isset($animal) ? $animal->type : '') == 'Bird' ? 'selected' : '' }}>Ave</option>
                            <option value="Reptile" {{ old('type', isset($animal) ? $animal->type : '') == 'Reptile' ? 'selected' : '' }}>Reptil</option>
                            <option value="Other" {{ old('type', isset($animal) ? $animal->type : '') == 'Other' ? 'selected' : '' }}>Otro</option>
                        </select>
                    </div>

                    <!-- Sex -->
                    <div class="form-group">
                        <label>Sexo:</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sex" id="gender_male" value="Male" 
                                {{ old('sex', isset($animal) ? $animal->sex : '') == 'Male' ? 'checked' : '' }}>
                            <label class="form-check-label" for="sex_male">Macho</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="sex" id="gender_female" value="Female" 
                                {{ old('sex', isset($animal) ? $animal->sex : '') == 'Female' ? 'checked' : '' }}>
                            <label class="form-check-label" for="sex_female">Hembra</label>
                        </div>
                    </div>

                    <!-- Date of Birth -->
                    <div class="form-group">
                        <label for="dob">Fecha de nacimiento:</label>
                        <input type="date" name="dob" id="dob" class="form-control" 
                            value="{{ old('dob', isset($animal) ? $animal->dob->format('d-m-Y') : '') }}">
                    </div>

                    <!-- Breed -->
                    <div class="form-group">
                        <label for="breed">Raza*:</label>
                        <input type="text" name="breed" id="breed" class="form-control" 
                            value="{{ old('breed', isset($animal) ? $animal->breed : '') }}">
                    </div>

                    <!-- Breed sec -->
                    <div class="form-group">
                        <label for="breed_sec">Raza (segunda):</label>
                        <input type="text" name="breed_sec" id="breed_Sec" class="form-control" 
                            value="{{ old('breed_sec', isset($animal) ? $animal->breed_sec : '') }}">
                    </div>

                    <!-- Layer -->
                    <div class="form-group">
                        <label for="layer">Capa:</label>
                        <input type="text" name="layer" id="layer" class="form-control" 
                            value="{{ old('layer', isset($animal) ? $animal->layer : '') }}">
                    </div>

                    <!-- Purpose -->
                    <div class="form-group">
                        <label for="purpose">Propósito*:</label>
                        <input type="text" name="purpose" id="purpose" class="form-control" 
                            value="{{ old('purpose', isset($animal) ? $animal->purpose : '') }}">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">{{ isset($animal) ? 'Actualizar animal' : 'Crear animal' }}</button>        <form method="POST" action="{{ route('animals.store') }}">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>