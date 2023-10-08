@extends ('layout.console')

@section ('content')

    <section>
        
        <h2>Add Events</h2>

        <form method="post" action="/console/events/add" novalidate>
            @csrf
            <div>
            <label for="event_name">Event name:</label>
            <input type="text" name="event_name" id="event_name" value="{{old('event_name')}}" required>
            
            @if ($errors->first('event_name'))
                <br>
                <span>{{$errors->first('event_name')}}</span>
            @endif
            </div>

            <button type="submit">Add Event</button>


        </form>

        <a href="/console/events/list">Back to Event List</a>

    </section>

@endsection