<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('clients.index', [
            'clients' => Client::where('user_id', Auth::id())->latest()->paginate(20),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'identifno' => 'required|string|max:50',
            'address' => 'required|string|max:255',
            'phoneno' => 'required|string|max:12',
        ]);

        $validated['user_id'] = Auth::id();

        Client::create($validated);

        return redirect()->route('clients.index')->with('success', 'Cliente creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
        ]);

        $client->update($validated);

        return redirect()->route('clients.index')->with('success', 'Cliente actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Cliente eliminado correctamente');
    }
}
