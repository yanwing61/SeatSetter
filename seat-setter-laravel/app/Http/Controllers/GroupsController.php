<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;

class GroupsController extends Controller
{
    public function list()
    {
        return view('groups.list',[
            'groups' => Group::all()
        ]);
    }

    public function delete(Group $group)
    {
       $group->delete();

       return redirect('/console/groups/list')
            ->with('message', 'Group has been deleted.');

    }

    public function addForm()
    {
        return view('groups.add');
    }

    public function add()
    {
        $attributesName = request()->validate([
            'group_name' => 'required|unique:groups|max:255',
        ]);

        $attributesSame = request()->validate([
            'same_table' => 'required',
        ]);

        $group = new Group();
        $group->group_name = $attributesName['group_name'];
        $group->same_table = $attributesSame['same_table'];
        $group->event_id = auth()->id();
        $group->save();

        return redirect('/console/groups/list')
            ->with('message', 'Group has been added.');

    }

    public function editForm(Group $group)
    {
        return view('groups.edit',[
            'group' => $group
        ]);
    }

    public function edit(Group $group)
    {
        $attributesName = request()->validate([
            'group_name' => 'required|unique:groups|max:255',
        ]);

        $attributesSame = request()->validate([
            'same_table' => 'required',
        ]);

        $group->group_name = $attributesName['group_name'];
        $group->same_table = $attributesSame['same_table'];
        $group->event_id = auth()->id();
        $group->save();

        return redirect('/console/groups/list')
            ->with('message', 'Group has been edited.');
    }
}
