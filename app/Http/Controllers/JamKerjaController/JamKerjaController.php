<?php

namespace App\Http\Controllers\JamKerjaController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JamKerjaController extends Controller
{
    public function index()
    {
        // Logic to retrieve and display the list of 'jam kerja'
        return view('jamkerja.index'); // Assuming you have a view for this
    }
}
