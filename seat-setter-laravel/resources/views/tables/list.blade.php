@extends ('layout.console')

@section ('content')

    <section>
        
            <h2>{{$event->event_name}} - Manage Tables</h2>
            <a href="/console/events/detail/{{$event->event_id}}"> Back to Event Page</a>
            <a href="/console/events/detail/{{$event->event_id}}/tables/add"> + New Table</a>
            
            <table class="table table-hover">
                <tr>
                    <th>Table id</th>
                    <th>No. of guests</th>
                    <th></th>
                    <th></th>
                </tr>
            <?php foreach($tables as $table): ?>
                <tr>
                    <td>{{$table->table_id}}</td>
                    <td>{{$table->num_of_guest}}</td>
                    <td><a href="/console/events/detail/{{$event->event_id}}/tables/edit/{{$table->table_id}}">Edit</a></td>
                    <td><a href="/console/events/detail/{{$event->event_id}}/tables/delete/{{$table->table_id}}">Delete</a></td>
                </tr>
            <?php endforeach; ?>
            </table>



    </section>

@endsection