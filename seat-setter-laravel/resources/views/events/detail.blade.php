@extends ('layout.console')

@section ('content')

    <section>

        <h2>{{$event->event_name}}</h2>

        <ul id="eventDetailList">
            <li><a href="/console/events/detail/{{$event->event_id}}/groups/list">Manage Groups</a></li>
            <li><a href="/console/tables/list">Manage Tables</a></li>
            <li><a href="/console/guests/list">Manage Guests</a></li>
            <li><a href="/console/seating/seating">Seating plan</a></li>
        </ul>
    </section>

@endsection