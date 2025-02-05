<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles del Acto Clínico') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <!-- Detalles del Cliente -->
                <h1 class="text-2xl font-bold mb-4">Detalles del Cliente</h1>
                <p><strong>Nombre:</strong> {{ $record->animal->client->name }}</p>
                <p><strong>Email:</strong> {{ $record->animal->client->email }}</p>

                <!-- Detalles del Animal -->
                <h1 class="text-2xl font-bold mt-6 mb-4">Detalles del Animal</h1>
                <p><strong>Nombre:</strong> {{ $record->animal->name }}</p>
                <p><strong>Nº Microchip:</strong> {{ $record->animal->microchipno }}</p>
                <p><strong>Sexo:</strong> {{ $record->animal->sex }}</p>
                <p>
                    <strong>Fecha de Nacimiento:</strong> 
                    {{ $record->animal->dob ? $record->animal->dob->format('d-m-Y') : 'No asignada' }}
                </p>
                <p><strong>Raza:</strong> {{ $record->animal->breed }}</p>

                <!-- Detalles del Acto Clínico -->
                <h1 class="text-2xl font-bold mt-6 mb-4">Detalles del Acto Clínico</h1>
                <p><strong>Fecha:</strong> {{ $record->date->format('d-m-Y') }}</p>
                <p><strong>Síntomas actuales:</strong> {{ $record->symptoms }}</p>
                <p><strong>Historial clínico:</strong> {{ $record->history }}</p>
                <p><strong>Medicamentos que está tomando:</strong> {{ $record->medicine_history }}</p>
                <p><strong>Alimentación:</strong> {{ $record->nourishmentm }}</p>
                <p><strong>Examen clínico:</strong> {{ $record->exam }}</p>
                <p><strong>Diagnóstico:</strong> {{ $record->diagnostic }}</p>
                <div class="border p-4 mb-4">
                    @if($record->analysis_url)
                        <p><strong>Análisis:</strong></p>
                        <iframe src="{{ asset('storage/' . $record->analysis_url) }}" width="100%" height="600px"></iframe>
                    @else
                        <p><strong>Análisis:</strong> No se adjuntó ninguna imagen</p>
                    @endif
                </div>
                <p><strong>Dps:</strong> {{ $record->dps }}</p>
                <p><strong>Principio(s) activo(s):</strong> {{ $record->active_ingr }}</p>
                <p><strong>Cantidad prescrita:</strong> {{ $record->quantity }}</p>
                <p><strong>Dosis y frecuencia:</strong> {{ $record->dose_freq }}</p>
                <p><strong>Vía de administración:</strong> {{ $record->admin_chann }}</p>
                <p><strong>Duración del tratamiento:</strong> {{ $record->treat_duration }}</p>
                <p><strong>Tipo de prescripción:</strong> {{ $record->prescr_type }}</p>
                <p><strong>Indicación para la prescripción:</strong> {{ $record->indications }}</p>
                <p><strong>Tratamiento:</strong> {{ $record->treatment }}</p>
                <p><strong>Advertencias:</strong> {{ $record->warnings }}</p>

                <!-- Detalles de las Recetas -->
                <h1 class="text-2xl font-bold mt-6 mb-4">Recetas</h1>
                @if($record->recipes->count() > 0)
                    @foreach($record->recipes as $recipe)
                        <div class="border p-4 mb-4">
                            <p><strong>Receta Nº:</strong> {{ $recipe->recipeno }}</p>
                            <p><strong>Botiquín o dispensación:</strong> {{ $recipe->provisionType }}</p>
                            @if($recipe->file_url)
                                <p><strong>Imagen adjunta:</strong></p>
                                <img src="{{ asset('storage/' . $recipe->file_url) }}" 
                                    alt="Imagen de la receta" 
                                    class="w-300 h-auto border rounded-lg shadow-md">
                            @else
                                <p><strong>Imagen adjunta:</strong> No se adjuntó ninguna imagen</p>
                            @endif
                        </div>
                    @endforeach
                @else
                    <p>No se han agregado recetas para este acto clínico.</p>
                @endif

                <!-- Botón para regresar -->
                <button onclick="history.back()" type="submit" class="btn btn-primary">Volver</button>
            </div>
        </div>
    </div>
</x-app-layout>
