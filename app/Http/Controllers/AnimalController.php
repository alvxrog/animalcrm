<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return view('animals.index', [
            'animals' => Animal::with('user')->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function create_from_client(Client $client)
    {
        return view('animals.create', compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required|string|max:255',
        'type' => 'required|string',
        'sex' => 'required|in:Male,Female',
        'dob' => 'required|date',
        'breed' => 'nullable|string|max:255',
        'breed_sec' => 'nullable|string|max:255',
        'layer' => 'nullable|string|max:255',
        'purpose' => 'nullable|string|max:255',
        'client_id' => 'required|exists:clients,id',
        'user_id' => 'required|exists:users,id',
        'microchipno' => 'required|string|max:255',
        ]);

        Animal::create($validated);

        return redirect()->route('clients.index')->with('success', 'Animal creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Animal $animal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
        $animal->delete();

        return redirect()->route('clients.index')->with('success', 'Animal deleted successfully!');
    }
}
