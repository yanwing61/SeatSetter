@extends ('layout.console')

@section ('content')
    
    <section>
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
                <div id="{{$table->table_id}}" class="droppable ui-widget-header" data-name="{{$table->table_id}}">
                    <p>Table {{$table->table_id}} : {{$table->num_of_guest}} guests</p>
                    <p class="msg"></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    </section>

@endsection
