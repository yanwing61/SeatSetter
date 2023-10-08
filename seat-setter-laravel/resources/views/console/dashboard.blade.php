@extends ('layout.console')

@section ('content')

    <section>
        <ul id="list">
            <li><a href="/console/users/list">Manage Users</a></li>
            <li><a href="/console/events/list">Manage Events</a></li>
            <li><a href="/console/groups/list">Manage Groups</a></li>
            <li><a href="/console/tables/list">Manage Tables</a></li>
            <li><a href="/console/guests/list">Manage Guests</a></li>
            <li><a href="/console/seating/seating">Seating plan</a></li>

        </ul>
    </section>

@endsection