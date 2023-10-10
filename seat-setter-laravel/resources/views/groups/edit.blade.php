@extends ('layout.console')

@section ('content')

    <section>
        
        <h2>Edit Group: <?= $group->group_name ?></h2>

        <form method="post" action="/console/events/detail/{{$event->event_id}}/groups/edit/<?= $group->group_id ?>" novalidate>
            @csrf

            <div>
            <label for="group_name">Group name:</label>
            <input type="text" name="group_name" id="group_name" value="{{old('group_name', $group->group_name)}}" required>
            
            @if ($errors->first('group_name'))
                <br>
                <span>{{$errors->first('group_name')}}</span>
            @endif
            </div>

            <div>
            <label>Guests at the same table:</label>

            <div>
                <input type="radio" id="same_table_yes" name="same_table" value="1" 
                    {{ old('same_table', $group->same_table) == 1 ? 'checked' : '' }} required>
                <label for="same_table_yes">Yes</label>
            </div>

            <div>
                <input type="radio" id="same_table_no" name="same_table" value="0" 
                    {{ old('same_table', $group->same_table) == 0 ? 'checked' : '' }} required>
                <label for="same_table_no">No</label>
            </div>

            @if ($errors->first('same_table'))
                <br>
                <span>{{$errors->first('same_table')}}</span>
            @endif
            </div>

            <button type="submit">Edit Group</button>


        </form>

        <a href="/console/events/detail/{{$event->event_id}}/groups/list">Back to Group List</a>

    </section>

@endsection