<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Client;
use App\Models\Animal;
use App\Models\Record;
use Illuminate\View\View;

class RecordController extends Controller
{
    //
    public function index() : View
    {
        $user = Auth::user();

        $records = Record::whereHas('client', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->latest()->paginate(20);

        return view('records.index', [
            'records' => $records,
        ]);
    }

    public function create()
    {
        $clients = Client::all();
        return view('records.create', compact('clients'));
    }

    public function create_from_animal(Animal $animal)
    {
        return view('records.create', compact('animal'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'animal_id' => 'required|exists:animals,id',
            'description' => 'nullable|string',
            'date' => 'nullable|date',
            'symptoms'=> 'nullable|string',
            'history'=> 'nullable|string',
            'medicine_history'=> 'nullable|string',
            'nourishmentm'=> 'nullable|string',
            'exam'=> 'nullable|string',
            'diagnostic' => 'nullable|string',
            'analysis_url' => 'nullable|mimes:pdf|max:4096',
            'dps'=> 'nullable|string',
            'active_ingr'=> 'nullable|string',
            'quantity'=> 'nullable|string',
            'dose_freq'=> 'nullable|string',
            'admin_chann'=> 'nullable|string',
            'treat_duration'=> 'nullable|string',
            'prescr_type'=> 'required|string|in:ordinary,exceptional',
            'indications'=> 'nullable|string',
            'treatment'=> 'required|string|in:therapeutic,profilactic,metafilactic',
            'warnings'=> 'nullable|string',
            'recipeno' => 'required|array',
            'recipeno.*' => 'nullable|string|max:255',
            'provisionType' => 'required|array',
            'provisionType.*' => 'nullable|string|max:255',
            'file_url.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096', // Máximo 4MB
        ]);

        // Almacenar análisis si lo tenemos
        if($request->hasFile("analysis_url")) {
            $file = $request->file("analysis_url");
            $fileUrl = $file->store('analysis', 'public');
            $validated['analysis_url'] = $fileUrl;
        }

        $recipeFields = ['recipeno', 'provisionType', 'file_url']; // Definir los nombres de los campos de Recipe

        // Extraer los datos de Recipe (los 4 últimos campos validados)
        $recipeData = array_intersect_key($validated, array_flip($recipeFields));

        // Extraer los datos de Record (resto de campos)
        $recordData = array_diff_key($validated, $recipeData);

        // Crear el Record
        $record = Record::create($recordData);
        
        // Crear recetas para el record
        foreach ($recipeData['recipeno'] as $index => $recipeno) {
            $fileUrl = null;

            if ($request->hasFile("file_url.$index")) {
                $file = $request->file("file_url.$index");
                $fileUrl = $file->store('recipes', 'public'); // Almacenar en storage/app/public/recipes
            }

            if($recipeno != null and $recipeData['provisionType'][$index] != null)
            {
                $record->recipes()->create([
                    'recipeno' => $recipeno,
                    'provisionType' => $recipeData['provisionType'][$index],
                    'file_url' => $fileUrl,
                ]);
            }
        }

        return redirect()->route('records.index')->with('success', 'Acto clínico generado correctamente');
    }

    public function show(Record $record)
    {
        return view('records.show', compact('record'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Record $record)
    {
        $record->delete();

        return redirect()->route('records.index')->with('success', 'Acto clinico eliminado correctamente');
    }
}
