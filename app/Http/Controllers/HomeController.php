<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // - Controlador sencillo paar mostrar el home:
    public function index()
    {
        // - Imágenes para el slider:
        $imagen = 'images/sliders/slider1.jpg';
    
    
        return view('pages.index', compact('imagen'));
    }
}