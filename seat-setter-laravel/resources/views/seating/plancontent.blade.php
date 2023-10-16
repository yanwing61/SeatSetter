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
</section>