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

    public function addForm()
    {
        return view('events.add');
    }

    public function add()
    {
        $attributes = request()->validate([
            'event_name' => 'required',
        ]);

        $event = new Event();
        $event->event_name = $attributes['event_name'];
        $event->user_id = auth()->id();
        $event->save();

        return redirect('/console/events/list')
            ->with('message', 'Event has been added.');

    }
}
