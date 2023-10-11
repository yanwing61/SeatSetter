<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Guest;
use App\Models\Group;
use App\Models\Table;

class SeatingController extends Controller
{
    public function index()
    {
        return view('seating.seating',[
            'events' => Event::all(),
            'guests' => Guest::all(),
            'groups' => Group::all(),
            'tables' => Table::all(),
        ]);
    }

}
