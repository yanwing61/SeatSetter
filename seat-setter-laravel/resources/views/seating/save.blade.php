@extends ('layout.console')

@section ('content')
    
    <section>

    <h2>{{$event->event_name}} Seating Plan</h2>
    <div id="seating-plan-con">
        <div id="names">
            <?php foreach($guests as $guest): ?>
                <div id="{{$guest->guest_id}}" class="draggable ui-widget-content" data-name="{{$guest->guest_id}}">
                    <p>{{$guest->guest_fname}} {{$guest->guest_lname}}</p>
                </div>
            <?php endforeach; ?>
        </div>

        <div id="tables">
            <?php foreach($tables as $table): ?>
                <div id="table1" class="droppable ui-widget-header" data-name="{{$table->table_id}}">
                    <div>Table {{$table->table_id}} : {{$table->num_of_guest}} guests <span class="msg"></span></div>
                    
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <form method="post" action="/console/events/detail/{event:event_id}/seating/save" novalidate>
        <input type="hidden" name="seating_assignments" id="seating_assignments" value="">    
        <button type="submit">Save plan</button>
    </form>

    
    </section>

@endsection
