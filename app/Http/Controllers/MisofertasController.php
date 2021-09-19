<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MisofertasController extends Controller
{
    public function index() {
        return view('misofertas');
    }
}
