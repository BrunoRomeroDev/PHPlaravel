<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventTeste extends Controller
{
    public function teste(){

    $nome = 'jose';

    $arr = [1,2,3,4,5];

    $nomes = ["bruon","theo","atonio"];

    return view('testevariavel',[   'nome' =>$nome,
                                    'arr' => $arr,
                                    'names' => $nomes]);
    }
}
