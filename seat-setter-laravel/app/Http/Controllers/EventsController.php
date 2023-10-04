<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventsController extends Controller
{
    public function list()
    {
        return view('events.list',[
            'events' => Event::all()
        ]);
    }
}
