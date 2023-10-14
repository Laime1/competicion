<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
// app/Http/Controllers/EventController.php
public function create()
    {
        return view('Event.create'); // Retorna la vista de creación de eventos
    }
public function store(Request $request)
{
    // Valida los datos ingresados por el usuario
    $validatedData = $request->validate([
        'event_name' => 'required|max:255',
        'event_date' => 'required',
        'event_time' => 'required',
        'event_location'=>'required',
        'imagen'=>'required',
        'event_description'=>'required',


        
        // Agrega más reglas de validación según tus necesidades
    ]);

    // Crea un nuevo evento en la base de datos
    $event = new Event();
    $event->event_name = $validatedData['event_name'];
    $event->event_date = $validatedData['event_date'];
    $event->event_time = $validatedData['event_time'];
    $event->event_location = $validatedData['event_location'];
    $event->imagen = $validatedData['imagen'];
    $event->event_description = $validatedData['event_description'];


    // Completa los campos adicionales del evento

    $event->save();

    // Redirige a una página de confirmación o a la lista de eventos
    return redirect('/events/create')->with('success', 'Evento creado con éxito');
    //return view('create')->with('message', 'Evento creado con éxito');
}
}
