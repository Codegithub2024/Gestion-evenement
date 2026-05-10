<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    protected function abortApi($code, $message = '', $status = 400, $details = [])
    {
        throw new \App\Exceptions\ApiException($code, $message, $status, $details);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Event::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:100',
            'description' => 'nullable',
            'date' => 'required',
            'location' => 'required',
            'capacity' => 'required|integer|min:1',
        ]);

        // 2. Création : On utilise $validated au lieu de $request->all() pour la sécurité
        $event = Event::create($validated);

        // 3. Retour succès
        return response()->json([
            'status' => 'success',
            'data' => $event
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
