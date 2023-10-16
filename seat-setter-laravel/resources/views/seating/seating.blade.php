@extends ('layout.console')

@section ('content')
    
    @include('seating.mainseating')

@endsection

@section ('links')

    <form method="post" action="/console/events/detail/{{$event->event_id}}/seating/seating" novalidate>
        @csrf
        <input type="hidden" name="seating_assignments" id="seating_assignments" value="">    
        <button type="submit">Save plan</button>
    </form>

    <!-- <section>
    <a href="/console/events/detail/{{$event->event_id}}/seating/preview/generate-img-pdf" target="_blank">Export seating plan image as PDF</a>
    </section> -->

@endsection