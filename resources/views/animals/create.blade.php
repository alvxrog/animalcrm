<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
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

    <!-- Form Start -->
    <form action="{{ route('animals.store')}}" method="POST">
        @csrf
        @if(isset($animal))
            @method('PUT')
        @endif

        <!-- Name -->
        <div class="form-group">
            <label for="name">Name<span class="text-danger">*</span>:</label>
            <input type="text" name="name" id="name" class="form-control" 
                   value="{{ old('name', isset($animal) ? $animal->name : '') }}" required>
        </div>

        <!-- Type of Animal -->
        <div class="form-group">
            <label for="type">Type of Animal<span class="text-danger">*</span>:</label>
            <select name="type" id="type" class="form-control" required>
                <option value="">-- Select Type --</option>
                <option value="Dog" {{ old('type', isset($animal) ? $animal->type : '') == 'Dog' ? 'selected' : '' }}>Dog</option>
                <option value="Cat" {{ old('type', isset($animal) ? $animal->type : '') == 'Cat' ? 'selected' : '' }}>Cat</option>
                <option value="Bird" {{ old('type', isset($animal) ? $animal->type : '') == 'Bird' ? 'selected' : '' }}>Bird</option>
                <option value="Reptile" {{ old('type', isset($animal) ? $animal->type : '') == 'Reptile' ? 'selected' : '' }}>Reptile</option>
                <option value="Other" {{ old('type', isset($animal) ? $animal->type : '') == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        <!-- Breed -->
        <div class="form-group">
            <label for="breed">Breed:</label>
            <input type="text" name="breed" id="breed" class="form-control" 
                   value="{{ old('breed', isset($animal) ? $animal->breed : '') }}">
        </div>

        <!-- Age -->
        <div class="form-group">
            <label for="age">Age<span class="text-danger">*</span>:</label>
            <input type="number" name="age" id="age" class="form-control" min="0" 
                   value="{{ old('age', isset($animal) ? $animal->age : '') }}" required>
        </div>

        <!-- Gender -->
        <div class="form-group">
            <label>Gender:</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="gender_male" value="Male" 
                       {{ old('gender', isset($animal) ? $animal->gender : '') == 'Male' ? 'checked' : '' }}>
                <label class="form-check-label" for="gender_male">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="gender_female" value="Female" 
                       {{ old('gender', isset($animal) ? $animal->gender : '') == 'Female' ? 'checked' : '' }}>
                <label class="form-check-label" for="gender_female">Female</label>
            </div>
        </div>

        <!-- Color -->
        <div class="form-group">
            <label for="color">Color:</label>
            <input type="text" name="color" id="color" class="form-control" 
                   value="{{ old('color', isset($animal) ? $animal->color : '') }}">
        </div>

        <!-- Owner -->
        <div class="form-group">
            <label for="owner_id">Owner<span class="text-danger">*</span>:</label>
            <select name="owner_id" id="owner_id" class="form-control" required>
                <option value="">-- Select Owner --</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" 
                        {{ old('client_id', isset($animal) ? $animal->client_id : '') == $client->id ? 'selected' : '' }}>
                        {{ $client->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Date of Birth -->
        <div class="form-group">
            <label for="dob">Date of Birth:</label>
            <input type="date" name="dob" id="dob" class="form-control" 
                   value="{{ old('dob', isset($animal) ? $animal->dob->format('Y-m-d') : '') }}">
        </div>

        <!-- Medical Conditions -->
        <div class="form-group">
            <label for="medical_conditions">Medical Conditions:</label>
            <textarea name="medical_conditions" id="medical_conditions" class="form-control" rows="3">{{ old('medical_conditions', isset($animal) ? $animal->medical_conditions : '') }}</textarea>
        </div>

        <!-- Vaccination Status -->
        <div class="form-group">
            <label for="vaccination_status">Vaccination Status:</label>
            <select name="vaccination_status" id="vaccination_status" class="form-control">
                <option value="">-- Select Status --</option>
                <option value="Up to date" {{ old('vaccination_status', isset($animal) ? $animal->vaccination_status : '') == 'Up to date' ? 'selected' : '' }}>Up to date</option>
                <option value="Pending" {{ old('vaccination_status', isset($animal) ? $animal->vaccination_status : '') == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Not Vaccinated" {{ old('vaccination_status', isset($animal) ? $animal->vaccination_status : '') == 'Not Vaccinated' ? 'selected' : '' }}>Not Vaccinated</option>
            </select>
        </div>

        <!-- Additional Notes -->
        <div class="form-group">
            <label for="notes">Additional Notes:</label>
            <textarea name="notes" id="notes" class="form-control" rows="3">{{ old('notes', isset($animal) ? $animal->notes : '') }}</textarea>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">{{ isset($animal) ? 'Update' : 'Submit' }}</button>        <form method="POST" action="{{ route('animals.store') }}">
    </div>
</x-app-layout>