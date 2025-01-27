<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Animal;
use App\Models\Record;
use Illuminate\View\View;

class RecordController extends Controller
{
    //
    public function index() : View
    {
        return view('records.index', [
            'records' => Record::latest()->paginate(20),
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
            'description' => 'required|string',
            'date' => 'required|date',
            'symptoms'=> 'required|string',
            'history'=> 'required|string',
            'medicine_history'=> 'required|string',
            'nourishmentm'=> 'required|string',
            'exam'=> 'required|string',
            'dps'=> 'required|string',
            'active_ingr'=> 'required|string',
            'quantity'=> 'required|string',
            'dose_freq'=> 'required|string',
            'admin_chann'=> 'required|string',
            'treat_duration'=> 'required|string',
            'prescr_type'=> 'required|string|in:ordinary,exceptional',
            'indications'=> 'required|string',
            'treatment'=> 'required|string|in:therapeutic,profilactic,metafilactic',
            'warnings'=> 'required|string',
        ]);

        Record::create($validated);

        return redirect()->route('records.index')->with('success', 'Record created successfully!');
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
