<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="/app.css">
    <script src="/app.js"></script>

</head>
<body>
    <header>
        <h1>Login</h1>
    </header>

    <section>
        <form method="post" action="/console/login" novalidation>

           @csrf

            <div>
                <label for="email">Email Address:</label>
                <input type="email" name="email" id="email" value="{{old('email')}}" required>
                
                @if ($errors->first('email'))
                    <br>
                    <span class="w3-text-red">{{$errors->first('email')}}</span>
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

</body>
</html>
