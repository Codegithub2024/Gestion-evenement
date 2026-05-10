<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegistrationController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $event = Event::findOrFail($request->event_id);

        if ($event->registrations()->count() >= $event->capacity) {
            $this->abortApi('EVENT_FULL', 'Désolé, cet événement est complet.', 400);
        }

        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => [
                'required',
                'email',
                Rule::unique('requests')->where(function ($query) use ($request) {
                    return $query->where('event_id', $request->event_id);
                }),
            ],
        ], [
            'email.unique' => 'Vous êtes déjà inscrit à cet événement avec cette adresse email.',
        ]);

        $request = Registration::create($validated);

        return response()->json($request, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Registration $registration)
    {

    }
    public function getPlaces($id)
    {
        $event = Event::findOrFail($id);

        if (!$event) {
            $this->abortApi('Erreur', 'Cet événement n\'existe pas.', 400);
        }
        return $event->registrations()->count();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registration $registration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registration $registration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registration $registration)
    {
        //
    }
}
