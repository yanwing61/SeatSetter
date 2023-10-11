<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Guest;
use App\Models\Group;
use App\Models\Table;

class SeatingController extends Controller
{
    public function index(Event $event)
    {
    
        return view('seating.seating',[
            'event' => $event,
            'guests' => Guest::all(),
            'groups' => Group::all(),
            'tables' => Table::all(),
        ]);
    }

    public function saveForm(Event $event)
    {
        return view('seating.seating', [
            'event' => $event,
            'guests' => Guest::all(),
            'groups' => Group::all(),
            'tables' => Table::all(),
        ]);
    }

    public function save(Event $event)
    {
        $attributes = request()->validate([
            'table_id' => 'required',
        ]);

        $guest->table_id = $attributes['table_id'];
        $group->save();

        return redirect("/console/events/detail/{$event->event_id}/groups/list")
            ->with('message', 'Group has been added.');

    }




}
