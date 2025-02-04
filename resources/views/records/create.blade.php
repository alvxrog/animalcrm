<x-app-layout>
    <link rel="stylesheet" href="{{ asset('css/forms.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nuevo acto clínico') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Detalles del cliente</h1>
                    <p><strong>Nombre:</strong> {{ $animal->client->name }}</p>
                    <p><strong>Email:</strong> {{ $animal->client->email }}</p>

                    <h1>Detalles del animal</h1>
                    <p><strong>Nombre:</strong> {{ $animal->name }}</p>
                    <p><strong>Nº Microchip:</strong> {{ $animal->microchipno }}</p>
                    <p><strong>Sexo:</strong> {{ $animal->sex }}</p>
                    <p><strong>Fecha de nacimiento:</strong> {{ $animal->dob->format('d-m-Y')}}</p>
                    <p><strong>Raza:</strong> {{ $animal->breed }}</p>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Cuidado</strong> Ha habido algunos problemas al crear el elemento.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <h1>Acto clínico:</h1>
                    <form action="{{ route('records.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- ClientID -->
                        <input type="hidden" name="client_id" value="{{ $animal->client->id }}">

                        <!-- AnimalID -->
                        <input type="hidden" name="animal_id" value="{{ $animal->id }}">

                        <div class="mb-3">
                            <label for="date" class="form-label">Fecha</label>
                            <input type="date" id="date" name="date" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="sypmtoms" class="form-label">Síntomas actuales</label>
                            <textarea id="symptoms" name="symptoms" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="history" class="form-label">Historial clínico</label>
                            <textarea id="history" name="history" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="medicine_history" class="form-label">Medicamentos que está tomando</label>
                            <textarea id="medicine_history" name="medicine_history" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="nourishmentm" class="form-label">Alimentación</label>
                            <textarea id="nourishmentm" name="nourishmentm" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="exam" class="form-label">Examen clínico</label>
                            <textarea id="exam" name="exam" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="dps" class="form-label">Dps (denominación del medicamento, concentración y forma farmacéutica)</label>
                            <textarea id="dps" name="dps" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="active_ingr" class="form-label">Principio o principios activos</label>
                            <textarea id="active_ingr" name="active_ingr" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label">Cantidad prescrita o nº de envases, incluido formato</label>
                            <textarea id="quantity" name="quantity" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="dose_freq" class="form-label">Dosis y frecuencia</label>
                            <textarea id="dose_freq" name="dose_freq" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="admin_chann" class="form-label">Vía de admin.</label>
                            <textarea id="admin_chann" name="admin_chann" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="treat_duration" class="form-label">Duración tratamiento y % envase</label>
                            <textarea id="treat_duration" name="treat_duration" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="prescr_type" class="form-label">Tipo de prescripción</label>
                            <select name="prescr_type" id="prescr_type" class="form-control">
                                @foreach (App\PrescriptionType::cases() as $role)
                                <option value="{{ $role->value }}">
                                    {{ $role->label() }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="indications" class="form-label">Indicación para la que se prescribe</label>
                            <textarea id="indications" name="indications" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="treatment" class="form-label">Tratamiento</label>
                            <select name="treatment" id="treatment" class="form-control">
                                @foreach (App\Treatment::cases() as $role)
                                <option value="{{ $role->value }}">
                                    {{ $role->label() }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="warnings" class="form-label">Advertencias e indicaciones para el propietario</label>
                            <textarea id="warnings" name="warnings" class="form-control"></textarea>
                        </div>
                        
                        <h1>Recetas (opcional)</h1>
                        <!-- Recetas -->
                        <div class="mb-3" id="recipes">
                            <div class="recipe">
                                <label for="recipeno[]">Receta Nº</label>
                                <input type="text" name="recipeno[]" required>

                                <label for="provisionType[]">Botiquín o dispensación</label>
                                <input type="text" name="provisionType[]" required></textarea>

                                <label for="file_url[]">Adjuntar imagen:</label>
                                <input type="file" name="file_url[]" accept=".pdf,.jpg,.jpeg,.png">
                            </div>
                        </div>

                        <button type="normal" class="btn btn-primary" onclick="addRecipe()">Añadir otra receta</button>

                        <button type="submit" class="btn btn-primary">Crear</button>
                    </form>
                    <script>
                        function addRecipe() {
                            let recipeDiv = document.createElement("div");
                            recipeDiv.classList.add("recipe");

                            recipeDiv.innerHTML = `
                                <label for="recipeno[]">Receta Nº</label>
                                <input type="text" name="recipeno[]" required>

                                <label for="provisionType[]">Botiquín o dispensación</label>
                                <input type="text" name="provisionType[]" required></textarea>

                                <label for="file_url[]">Adjuntar imagen:</label>
                                <input type="file" name="file_url[]" accept=".pdf,.jpg,.jpeg,.png">

                                <button type="remove" onclick="removeRecipe(this)">Eliminar</button>
                            `;

                            document.getElementById("recipes").appendChild(recipeDiv);
                        }

                        function removeRecipe(button) {
                            button.parentElement.remove();
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>