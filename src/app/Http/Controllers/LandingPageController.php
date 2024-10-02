<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('landing'); // Asegúrate de tener la vista landing.blade.php creada en resources/views
    }
}
