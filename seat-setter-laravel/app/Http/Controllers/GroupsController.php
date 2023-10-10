<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Event;

class GroupsController extends Controller
{
    public function list(Event $event)
    {
        $groups = Group::where('event_id', $event->event_id)->get();
    
        return view('groups.list', [
            'groups' => $groups,
            'event' => $event
        ]);
    }

    public function delete(Event $event, Group $group)
    {
       $group->delete();

       return redirect("/console/events/detail/{$event->event_id}/groups/list")
            ->with('message', 'Group has been deleted.');

    }

    public function addForm(Event $event)
    {
        return view('groups.add', [
            'event' => $event
        ]);
    }

    public function add(Event $event)
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
        $group->event_id = $event->event_id;
        $group->save();

        return redirect("/console/events/detail/{$event->event_id}/groups/list")
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
        $group->event_id = $event->event_id;
        $group->save();

        return redirect("/console/events/detail/{$event->event_id}/groups/list")
            ->with('message', 'Group has been edited.');
    }
}
