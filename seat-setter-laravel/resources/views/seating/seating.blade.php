@extends ('layout.console')

@section ('content')
    
    <section>
    <div id="seating-plan-con">
        <div id="names">
            <div id="name1" class="draggable ui-widget-content" data-name="Jane">
                <p>Jane</p>
            </div>

            <div id="name2" class="draggable ui-widget-content">
                <p>Ken</p>
            </div>

            <div id="name3" class="draggable ui-widget-content">
                <p>Barbie</p>
            </div>

            <div id="name4" class="draggable ui-widget-content">
                <p>Katy</p>
            </div>

            <div id="name5" class="draggable ui-widget-content">
                <p>Mary</p>
            </div>
        </div>

        <div id="tables">
            <div id="table1" class="droppable ui-widget-header">
                <p>Table 1</p>
            </div>

            <div id="table2" class="droppable ui-widget-header">
                <p>Table 2</p>
            </div>

            <div id="table3" class="droppable ui-widget-header">
                <p>Table 3</p>
            </div>

            <div id="table4" class="droppable ui-widget-header">
                <p>Table 4</p>
            </div>
        </div>
    </div>

    <script src="/app.js"></script>
    </section>

@endsection
