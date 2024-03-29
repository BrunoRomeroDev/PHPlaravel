<?php

namespace App\Http\Controllers;

Use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class EventEdit extends Controller
{
 public function edit($id){

      $user = auth()->user();
      $event = Event::findOrFail($id);
      $event->image = Storage::url($event->image);//local PMSV

      if($user->id != $event->user->$id){
        return redirect('/dashboard');
      }
   return view('edit',['event' => $event]);
 }

 public function update(Request $request){

   $data = $request->all();

   // Image Upload
   if($request->hasFile('image') && $request->file('image')->isValid()) {

      $requestImage = $request->image;

      $extension = $requestImage->extension();

      $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

      //$requestImage->move(public_path('img'.DIRECTORY_SEPARATOR.'events'), $imageName);
      $requestImage->storeAs('public',$imageName);//local PMSV

      $data['image'] = $imageName;

  
  }

   Event::findOrFail($request->id)->update($data);

   return redirect('/dashboard')->with('msg','Evento editado com sucesso!');
 }
}
