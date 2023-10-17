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

    public function delete(Event $event, $table_id)
    {
        $table = Table::find($table_id);
    
        if (!$table) {
            abort(404);
        }

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
            'num_of_table' => 'nullable|integer|min:1'
        ]);

        $numOfTables = $attributes['num_of_table'] ?? 1;

        for ($i = 0; $i < $numOfTables; $i++) {
            $table = new Table();
            $table->num_of_guest = $attributes['num_of_guest'];
            $table->event_id = $event->event_id;
            $table->save();
        }


        return redirect("/console/events/detail/{$event->event_id}/tables/list")
            ->with('message', 'Table(s) have been added.');

    }

    public function editForm(Event $event, $table_id)
    {
        $table = Table::find($table_id);
    
        if (!$table) {
            abort(404);
        }

        return view('tables.edit',[
            'table' => $table,
            'event' => $event,
        ]);
    }

    public function edit(Event $event, $table_id)
    {
        $table = Table::find($table_id);
    
        if (!$table) {
            abort(404);
        }

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
