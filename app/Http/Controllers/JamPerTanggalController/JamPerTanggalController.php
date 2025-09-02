<?php

namespace App\Http\Controllers\JamPerTanggalController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JamPerTanggalController extends Controller
{
    public function index()
    {
        // Logic to retrieve and display the list of 'jam per tanggal'
        return view('jampertanggal.index'); // Assuming you have a view for this
    }
}
