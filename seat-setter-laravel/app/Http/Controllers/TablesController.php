<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Event;

class TablesController extends Controller
{
    public function list(Event $event)
    {
        $tables = Table::where('event_id', $event->event_id)->get();
    
        return view('tables.list', [
            'tables' => $tables,
            'event' => $event
        ]);
    }

    public function delete(Event $event, Table $table)
    {
       $table->delete();

       return redirect("/console/events/detail/{$event->event_id}/tables/list")
            ->with('message', 'Table has been deleted.');

    }

    public function addForm(Event $event)
    {
        return view('tables.add', [
            'event' => $event
        ]);
    }

    public function add(Event $event)
    {
        $attributes = request()->validate([
            'num_of_guest' => 'required',
        ]);

        $table = new Table();
        $table->num_of_guest = $attributes['num_of_guest'];
        $table->event_id = $event->event_id;
        $table->save();

        return redirect("/console/events/detail/{$event->event_id}/tables/list")
            ->with('message', 'Table has been added.');

    }

    public function editForm(Event $event, Table $table)
    {
        
        return view('tables.edit',[
            'table' => $table,
            'event' => $event,
        ]);
    }

    public function edit(Event $event, Table $table)
    {
        $attributes = request()->validate([
            'num_of_guest' => 'required',
        ]);

        $table->num_of_guest = $attributes['num_of_guest'];
        $table->event_id = $event->event_id;
        $table->save();

        return redirect("/console/events/detail/{$event->event_id}/tables/list")
            ->with('message', 'Table has been edited.');
    }
}
