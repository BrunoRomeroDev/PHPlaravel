<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;


class EventController extends Controller
{
    public function index(){
        $events = Event::all();
        return view('welcome',['events' => $events]);
    }

    public function store(Request $request){

        $event = new Event();

        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->items = $request->items;

         // Image Upload
         if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            //$requestImage->move(public_path('img'.DIRECTORY_SEPARATOR.'events'), $imageName);
            $requestImage->storeAs('public',$imageName);
            
            $event->image = $imageName;

        }else{
            $event->image = 'sem imagem';
        }

        $event->save();

        return redirect('/')->with('msg','Evento criado com sucesso!');


    }
}
