@extends ('layout.console')

@section ('content')

    @include('seating.plancontent')

@endsection

@section ('links')

    <section>
        <a href="/console/events/detail/{{$event->event_id}}/seating/seating">Edit seating plan</a>
        <a href="/console/events/detail/{{$event->event_id}}/seating/preview/generate-csv" target="_blank">Export list as CSV</a>
        <a href="/console/events/detail/{{$event->event_id}}/seating/preview/generate-pdf" target="_blank">Export list as PDF</a>
        <a href="/console/events/detail/{{$event->event_id}}/seating/preview/generate-img-pdf" target="_blank">Export seating plan image as PDF</a>
    </section>
@endsection