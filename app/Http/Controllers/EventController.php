<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        //modification de controlleur
        return view('events.index', compact('events'));
    }
    
    // Afficher le formulaire de création d'un événement
    public function create()
    {
        return view('events.create');
    }

    // Enregistrer un nouvel événement dans la base de données
    public function store(Request $request)
    {
        //dd($request);
        
        $event = new Event();
        $event->nomevenement = $request->name;
        $event->description = $request->description;
        $event->datedebut = $request->start_date; 
        $event->datefin = $request->end_date;
        $event->save();
        //dd($event);

        return redirect()->route('events.index')->with('success', 'Event created successfully');
    }

    // Afficher les détails d'un événement spécifique
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }

    // Afficher le formulaire d'édition d'un événement
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    // Mettre à jour un événement dans la base de données
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nomevenement' => 'required',
            'datedebut' => 'required',
            'datefin' => 'required',
        ]);

        Event::whereId($id)->update($validatedData);

        return redirect()->route('events.index')->with('success', 'Event updated successfully');
    }

    // Supprimer un événement de la base de données
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully');
    }
}
