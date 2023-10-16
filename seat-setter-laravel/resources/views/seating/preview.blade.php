@extends ('layout.console')

@section ('content')

    <section>
        
            <h2>{{$event->event_name}} Seating Preview</h2>
            <table class="table table-hover">
                <tr>
                    <th>Table id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Group id</th>
                    <th>Remarks</th>
                </tr>
            <?php foreach($guests as $guest): ?>
                <tr>
                    <td>{{$guest->table_id}}</td>
                    <td>{{$guest->guest_fname}}</td>
                    <td>{{$guest->guest_lname}}</td>
                    <td>{{$guest->group_id}}</td>
                    <td>{{$guest->guest_remarks}}</td>
                </tr>
            <?php endforeach; ?>
            </table>

        <a href="/console/events/detail/{{$event->event_id}}/seating/seating">Back to seating plan</a>
        <a href="/">Export plan as CSV</a>
        <a href="/console/events/detail/{{$event->event_id}}/seating/preview/generate-pdf" target="_blank">Export plan as PDF</a>

    </section>

@endsection