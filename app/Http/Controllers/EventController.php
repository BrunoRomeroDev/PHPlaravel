<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;


class EventController extends Controller
{
    public function index(){
        $search = request('search');
        if($search){
            $events = Event::where([
                ['title','like','%'.$search.'%']
            ])->get();
        }else{
            $events = Event::all();
        }
        return view('welcome',['events' => $events,'search' =>$search]);
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
            $requestImage->storeAs('public',$imageName);//local PMSV

            $event->image = $imageName;

        }else{
            $event->image = 'sem imagem';
        }

        $user = auth()->user();
        $event->user_id = $user->id;

        $event->save();

        return redirect('/')->with('msg','Evento criado com sucesso!');


    }

    public function dashboard(){

        $user = auth()->user();
        $events = $user->events;
        $eventsAsParticipant = $user->eventAsParticipant;

        return view('dashboard',['events'=>$events, 'eventsasparticipant' => $eventsAsParticipant]);
    }

    public function joinEvent($id){

        $user = auth()->user();
        $user->eventAsParticipant()->attach($id);
        $event = Event::findOrFail($id);

        return redirect('/dashboard')->with('msg','Presença confirmada! '.$event->title);
    }

    public function leaveEvent($id){
        
        $user = auth()->user();
        $user->eventAsParticipant()->detach($id);
        $event = Event::findOrFail($id);

        return redirect('/dashboard')->with('msg','Saiu do evento com sucesso! '.$event->title);
    }
}
