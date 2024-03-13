<?php

namespace App\Http\Controllers;

Use App\Models\Event;


class EventDelete extends Controller
{
 public function destroy($id){
    Event::findOrFail($id)->delete();
    return redirect('/dashboard')->with('msg','Evento excluido com sucesso!');
 }
}
