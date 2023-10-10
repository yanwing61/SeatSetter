@extends ('layout.console')

@section ('content')

    <section>
        
            <h2>Manage Events</h2>
            <a href="/console/events/add">+ New Event</a>
            <table class="table table-hover">
                <tr>
                    <th>Event Name</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            <?php foreach($events as $event): ?>
                <tr>
                    <td>{{$event->event_name}}</td>
                    <td><a href="/console/events/detail/{{$event->event_id}}">Event details</a></td>
                    <td><a href="/console/events/edit/{{$event->event_id}}">Edit event name</a></td>
                    <td><a href="/console/events/delete/{{$event->event_id}}">Delete</a></td>
                </tr>
            <?php endforeach; ?>
            </table>

    


    </section>

@endsection