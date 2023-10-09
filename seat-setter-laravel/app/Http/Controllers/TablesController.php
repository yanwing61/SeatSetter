<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;

class TablesController extends Controller
{
    public function list()
    {
        return view('tables.list',[
            'tables' => Table::all()
        ]);
    }

    public function delete(Table $table)
    {
       $table->delete();

       return redirect('/console/tables/list')
            ->with('message', 'Table has been deleted.');

    }

    public function addForm()
    {
        return view('tables.add');
    }

    public function add()
    {

        $attributesGuest = request()->validate([
            'num_of_guest' => 'required',
        ]);

        $table = new Table();
        $table->num_of_guest = $attributesGuest['num_of_guest'];
        $table->event_id = auth()->id();
        $table->save();

        return redirect('/console/tables/list')
            ->with('message', 'Table has been added.');

    }

    public function editForm(Table $table)
    {
        return view('tables.edit',[
            'table' => $table
        ]);
    }

    public function edit(Table $table)
    {
        $attributesGuest = request()->validate([
            'num_of_guest' => 'required',
        ]);

        $table->num_of_guest = $attributesGuest['num_of_guest'];
        $table->event_id = auth()->id();
        $table->save();

        return redirect('/console/tables/list')
            ->with('message', 'Table has been edited.');
    }
}
