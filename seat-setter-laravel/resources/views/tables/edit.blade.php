@extends ('layout.console')

@section ('content')

    <section>
        
        <h2>Edit Table: <?= $table->table_id ?></h2>

        <form method="post" action="/console/events/detail/{{$event->event_id}}/tables/edit/<?= $table->table_id ?>" novalidate>
            @csrf

            <div>
                <label for="num_of_guest">Number of Guests:</label>
                <input type="number" id="num_of_guest" name="num_of_guest" value="{{old('num_of_guest', $table->table_id)}}" required>

            
                @if ($errors->first('num_of_guest'))
                    <br>
                    <span>{{$errors->first('num_of_guest')}}</span>
                @endif
            </div>

            <button type="submit">Edit Table</button>


        </form>

        <a href="/console/events/detail/{{$event->event_id}}/tables/list">Back to Table List</a>

    </section>

@endsection