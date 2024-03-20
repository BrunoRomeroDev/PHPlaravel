<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class EventCreate extends Controller
{
    public function createEvent(){
        $criar = 'evento criado';
        return view('create', ['create' => $criar]) ;
    }

    public function show($id) {

        $event = Event::findOrFail($id);
        $user = auth()->user();
        $hashUserJoined = false;

        if($user){
            $userEvents = $user->eventAsParticipant->toArray();
            
            foreach($userEvents as $userEvent){
                if($userEvent['id'] == $id){
                    $hashUserJoined = true;
                }
            }
        }

        $event->image = Storage::url($event->image);//local PMSV
        $eventOwner = User::where('id',$event->user_id)->first()->toArray();
        return view('show', ['event' => $event, 'eventOwner' => $eventOwner, 'hasUserJoined' => $hashUserJoined]);

    }
}
