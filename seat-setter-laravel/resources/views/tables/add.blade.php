@extends ('layout.console')

@section ('content')

    <section>
        
        <h2>Add Table</h2>

        <form method="post" action="/console/tables/add" novalidate>
            @csrf

            <div>
                <label for="num_of_guest">Number of Guests:</label>
                <input type="number" id="num_of_guest" name="num_of_guest" value="{{old('num_of_guest')}}" required>

            
                @if ($errors->first('num_of_guest'))
                    <br>
                    <span>{{$errors->first('num_of_guest')}}</span>
                @endif
            </div>

            <button type="submit">Add Table</button>


        </form>

        <a href="/console/tables/list">Back to Table List</a>

    </section>

@endsection