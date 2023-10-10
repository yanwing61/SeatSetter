@extends ('layout.console')

@section ('content')

    <section>
        
        <h2>Add User</h2>

        <form method="post" action="/console/users/add" novalidate>
            @csrf

            <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{old('name')}}" required>
            
            @if ($errors->first('name'))
                <br>
                <span>{{$errors->first('name')}}</span>
            @endif
            </div>

            <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{old('email')}}">

            @if ($errors->first('email'))
                <br>
                <span>{{$errors->first('email')}}</span>
            @endif
            </div>

            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">

                @if ($errors->first('password'))
                    <br>
                    <span>{{$errors->first('password')}}</span>
                @endif
            </div>

            <button type="submit">Add User</button>


        </form>

        <a href="/console/users/list">Back to User List</a>

    </section>

@endsection