@extends ('layout.console')

@section ('content')
    
    <section>
    <a href="/console/events/detail/{{$event->event_id}}"> Back to Event Page</a>

    </section>
    
    @include('seating.mainseating')

@endsection

@section ('links')

    <form method="post" action="/console/events/detail/{{$event->event_id}}/seating/seating" novalidate>
        @csrf
        <input type="hidden" name="seating_assignments" id="seating_assignments" value="">    
        <button type="button" id="auto">Auto Seating</button>
        <button type="submit">Save plan</button>
    </form>


@endsection