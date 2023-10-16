@extends ('layout.console')

@section ('content')

    @include('seating.plancontent')

@endsection

@section ('links')

    <section>
        <a href="/console/events/detail/{{$event->event_id}}/seating/seating">Back to seating plan</a>
        <a href="/">Export plan as CSV</a>
        <a href="/console/events/detail/{{$event->event_id}}/seating/preview/generate-pdf" target="_blank">Export plan as PDF</a>
    </section>
@endsection