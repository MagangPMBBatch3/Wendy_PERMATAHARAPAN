<?php

namespace App\Http\Controllers\ModeJamKerjaController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModeJamKerjaController extends Controller
{
    public function index()
    {
        return view('modejamkerja.index');
    }
}
