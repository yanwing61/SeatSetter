<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\Guest;
use App\Models\Group;
use App\Models\Table;

class EventsController extends Controller
{
    public function list()
    {
        // Get the currently authenticated user's ID
        $user_id = Auth::id();

        // Retrieve events for the user
        $events = Event::where('user_id', $user_id)->get();

        // Return the view with the events
        return view('events.list', ['events' => $events]);

    }

    public function detail(Event $event)
    {
        return view('events.detail', [
            'event' => $event
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
            'event_name' => 'required|unique:events|max:255',
        ]);

        $event = new Event();
        $event->event_name = $attributes['event_name'];
        $event->user_id = auth()->id();
        $event->save();

        return redirect('/console/events/list')
            ->with('message', 'Event has been added.');

    }

    public function editForm(Event $event)
    {
        return view('events.edit',[
            'event' => $event
        ]);
    }

    public function edit(Event $event)
    {
        $attributes = request()->validate([
            'event_name' => 'required|unique:events|max:255',
        ]);

        $event->event_name = $attributes['event_name'];
        $event->user_id = auth()->id();
        $event->save();

        return redirect('/console/events/list')
            ->with('message', 'Event has been edited.');
    }
}
