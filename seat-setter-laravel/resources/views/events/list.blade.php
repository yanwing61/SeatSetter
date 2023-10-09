@extends ('layout.console')

@section ('content')

    <section>
        
            <h2>Manage Events</h2>
            <table class="table table-hover">
                <tr>
                    <th>Event Name</th>
                    <th></th>
                    <th></th>
                </tr>
            <?php foreach($events as $event): ?>
                <tr>
                    <td>{{$event->event_name}}</td>
                    <td><a href="/console/events/edit/{{$event->event_id}}">Edit</a></td>
                    <td><a href="/console/events/delete/{{$event->event_id}}">Delete</a></td>
                </tr>
            <?php endforeach; ?>
            </table>

    <a href="/console/events/add">New Event</a>


    </section>

@endsection