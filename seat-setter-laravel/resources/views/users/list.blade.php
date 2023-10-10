@extends ('layout.console')

@section ('content')

    <section>
        
            <h2>Manage Users</h2>
            <a href="/console/users/add"> + New User</a>
            
            <table class="table table-hover">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created at</th>
                    <th></th>
                    <th></th>
                </tr>
            <?php foreach($users as $user): ?>
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at->format('M j, Y')}}</td>
                    <td><a href="/console/users/edit/{{$user->id}}">Edit</a></td>
                    <td><a href="/console/users/delete/{{$user->id}}">Delete</a></td>
                </tr>
            <?php endforeach; ?>
            </table>



    </section>

@endsection