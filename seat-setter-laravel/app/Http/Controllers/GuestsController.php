<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;
use App\Models\Event;
use App\Models\Group;
use App\Models\Table;

class GuestsController extends Controller
{
    public function list()
    {
        
        return view('guests.list',[
            'guests' => Guest::all(),
        ]);
    }

    public function delete(Guest $guest)
    {
       $guest->delete();

       return redirect('/console/guests/list')
            ->with('message', 'Guest has been deleted.');

    }

    public function addForm()
    {
        return view('guests.add', [
            'groups' => Group::all(),
            'tables' => Table::all(),
        ]);
    }

    public function add()
    {
        $attributes = request()->validate([
            'guest_fname' => 'required',
            'guest_lname' => 'required',
            'guest_remarks' => 'nullable',
            'group_id' => 'nullable',
            'table_id' => 'nullable',
        ]);

        $guest = new Guest();
        $guest->guest_fname = $attributes['guest_fname'];
        $guest->guest_lname = $attributes['guest_lname'];
        $guest->guest_remarks = $attributes['guest_remarks'];
        $guest->group_id = $attributes['group_id'];
        $guest->table_id = $attributes['table_id'];
        $guest->save();

        return redirect('/console/guests/list')
            ->with('message', 'Guest has been added.');

    }

    public function editForm(Guest $guest)
    {
        return view('guests.edit',[
            'guest' => $guest,
            'groups' => Group::all(),
            'tables' => Table::all(),
        ]);
    }

    public function edit(Guest $guest)
    {
        $attributes = request()->validate([
            'guest_fname' => 'required',
            'guest_lname' => 'required',
            'guest_remarks' => 'nullable',
            'group_id' => 'nullable',
            'table_id' => 'nullable',
        ]);

        $guest->guest_fname = $attributes['guest_fname'];
        $guest->guest_lname = $attributes['guest_lname'];
        $guest->guest_remarks = $attributes['guest_remarks'];
        $guest->group_id = $attributes['group_id'];
        $guest->table_id = $attributes['table_id'];
        $guest->save();

        return redirect('/console/guests/list')
            ->with('message', 'Guest has been edited.');
    }
}
