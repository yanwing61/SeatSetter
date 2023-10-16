@extends ('layout.console')

@section ('content')
    <section>
        <form id="loginForm" method="post" action="/console/login" novalidation>

           @csrf

            <div>
                <label for="email">Email Address:</label>
                <input type="email" name="email" id="email" value="{{old('email')}}" required>
                
                @if ($errors->first('email'))
                    <br>
                    <span>{{$errors->first('email')}}</span>
                @endif
            </div>

            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>

                @if ($errors->first('password'))
                    <br>
                    <span>{{$errors->first('password')}}</span>
                @endif
            </div>

            <button type="submit">Login</button>

    </form>
    </section>

@endsection