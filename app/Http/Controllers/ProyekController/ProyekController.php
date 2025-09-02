<?php

namespace App\Http\Controllers\ProyekController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    public function index()
    {
        // Logic to retrieve and display the list of 'proyek'
        return view('proyek.index'); // Assuming you have a view for this
    }
}
