@extends ('layout.console')

@section ('content')

    <section>
        
            <h2>Manage Guests</h2>
            <a href="/console/events/detail/{{$event->event_id}}"> Back to Event Page</a>
            <a href="/console/guests/add"> + New Guest</a>
            
            <table class="table table-hover">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Remarks</th>
                    <th>Group id</th>
                    <th>Table id</th>
                    <th></th>
                    <th></th>
                </tr>
            <?php foreach($guests as $guest): ?>
                <tr>
                    <td>{{$guest->guest_fname}}</td>
                    <td>{{$guest->guest_lname}}</td>
                    <td>{{$guest->guest_remarks}}</td>
                    <td>{{$guest->group_id}}</td>
                    <td>{{$guest->table_id}}</td>
                    <td><a href="/console/guests/edit/{{$guest->guest_id}}">Edit</a></td>
                    <td><a href="/console/guests/delete/{{$guest->guest_id}}">Delete</a></td>
                </tr>
            <?php endforeach; ?>
            </table>



    </section>

@endsection