<style>

.draggable {
    height: 30px;
    padding: 5px;
    margin: 5px;
}

.droppable {
    width: 300px;
    height: 300px;
    padding: 0.5em;
    margin: 1em;
    border-radius: 10px;
}
</style>

<section>

<h2>{{$event->event_name}} Seating Plan</h2>
<div id="seating-plan-con">
    <div id="names">
        <?php foreach($guests as $guest): ?>
            <?php if (!$guest->table_id):  ?>
                <div id="{{$guest->guest_id}}" class="draggable ui-widget-content" data-name="{{$guest->guest_id}}">
                    <p>{{$guest->guest_fname}} {{$guest->guest_lname}}</p>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

    <div id="tables">
        <?php foreach($tables as $table): ?>
            <div class="droppable ui-widget-header" data-name="{{$table->table_id}}">
                <div>Table {{$table->table_id}} : {{$table->num_of_guest}} guests <span class="msg"></span></div>

                <?php  
                foreach($guests as $guest): 
                    if ($guest->table_id == $table->table_id): ?>
                        <div id="{{$guest->guest_id}}" class="draggable ui-widget-content" data-name="{{$guest->guest_id}}">
                            <p>{{$guest->guest_fname}} {{$guest->guest_lname}}</p>
                        </div>
                    <?php endif; 
                endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>

</section>