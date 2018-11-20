<?php

namespace SisVentas\Http\Controllers;

use Illuminate\Http\Request;

class MensajeController extends Controller
{
    
    
    public  function Mensaje(){

        return view('Return.direcciones');
    }
    public function paginas(){
        return view('home');
    }

}
