@extends ('layout.console')

@section ('content')

    <section>
        
            <h2>Manage Groups</h2>
            <table class="table table-hover">
                <tr>
                    <th>Group Name</th>
                    <th>Same table?</th>
                    <th></th>
                    <th></th>
                </tr>
            <?php foreach($groups as $group): ?>
                <tr>
                    <td>{{$group->group_name}}</td>
                    <td>{{$group->same_table}}</td>
                    <td><a href="/console/groups/edit/{{$group->group_id}}">Edit</a></td>
                    <td><a href="/console/groups/delete/{{$group->group_id}}">Delete</a></td>
                </tr>
            <?php endforeach; ?>
            </table>

    <a href="/console/groups/add"> + New Group</a>


    </section>

@endsection