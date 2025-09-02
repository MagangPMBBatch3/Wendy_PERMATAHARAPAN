<?php

namespace App\Http\Controllers\StatusJamKerjaController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatusJamKerjaController extends Controller
{
    public function index()
    {
        return view('statusjamkerja.index');
    }
}
