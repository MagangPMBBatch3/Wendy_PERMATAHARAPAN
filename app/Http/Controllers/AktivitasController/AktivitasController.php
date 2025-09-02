<?php

namespace App\Http\Controllers\AktivitasController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AktivitasController extends Controller
{
    public function index()
    {
        // Logic to retrieve and display the list of 'aktivitas'
        return view('aktivitas.index'); // Assuming you have a view for this
    }
}
