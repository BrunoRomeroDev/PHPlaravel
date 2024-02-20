<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventCreate extends Controller
{
    public function createEvent(){
        $criar = 'evento criado';
        return view('create', ['create' => $criar]) ;
    }
}
