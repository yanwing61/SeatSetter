<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeatingController extends Controller
{
    //
    public function index()
    {
        return view('seating.seating');
    }

}
