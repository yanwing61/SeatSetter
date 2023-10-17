@extends ('layout.console')

@section ('content')

    <section>
        
        <h2>Add Table</h2>

        <form method="post" action="/console/events/detail/{{$event->event_id}}/tables/add" novalidate>
            @csrf

            <div>
                <label for="num_of_guest">Number of Guests:</label>
                <input type="number" id="num_of_guest" name="num_of_guest" value="{{old('num_of_guest')}}" required>
                <div></div>
                <label for="num_of_table">Number of Table: [default 1]</label>
                <input type="number" id="num_of_table" name="num_of_table">
            
                @if ($errors->first('num_of_guest'))
                    <br>
                    <span>{{$errors->first('num_of_guest')}}</span>
                @endif
            </div>

            <button type="submit">Add Table</button>
        </form>

        <a href="/console/events/detail/{{$event->event_id}}/tables/list">Back to Table List</a>

    </section>

@endsection