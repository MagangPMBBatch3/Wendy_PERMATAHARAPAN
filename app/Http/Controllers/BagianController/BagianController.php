<?php

namespace App\Http\Controllers\BagianController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BagianController extends Controller
{
    public function index()
    {
        // Logic to retrieve and display the list of 'bagian'
        return view('bagian.index'); // Assuming you have a view for this
    }
}
