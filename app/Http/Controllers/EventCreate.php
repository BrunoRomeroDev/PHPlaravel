<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Event;

class EventCreate extends Controller
{
    public function createEvent(){
        $criar = 'evento criado';
        return view('create', ['create' => $criar]) ;
    }

    public function show($id) {

        $event = Event::findOrFail($id);

        return view('show', ['event' => $event]);
        
    }
}
