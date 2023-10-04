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

    public function delete(Event $event)
    {
       $event->delete();

       return redirect('/console/events/list')
            ->with('message', 'Event has been deleted.');

    }
}
