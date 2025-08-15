<?php

namespace App\Http\Controllers\LevelController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index()
    {
        // Logic to retrieve and display the list of 'levels'
        return view('level.index'); // Assuming you have a view for this
    }
}
