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
        $clients = Client::all();
        return view('animals.create', [
            'clients' => Animal::with('user')->latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required|string|max:255',
        'type' => 'required|string',
        'breed' => 'nullable|string|max:255',
        'age' => 'required|integer|min:0',
        'gender' => 'nullable|in:Male,Female',
        'color' => 'nullable|string|max:255',
        'owner_id' => 'required|exists:owners,id',
        'dob' => 'nullable|date',
        'medical_conditions' => 'nullable|string',
        'vaccination_status' => 'nullable|string',
        'notes' => 'nullable|string',
        ]);

        Animal::create($validated);

        return redirect()->route('animals.index')->with('success', 'Animal created successfully.');
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
        //
    }
}
