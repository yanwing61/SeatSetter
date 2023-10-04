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
        <h1>Dashboard</h1>

        <?php if(Auth::check()): ?>
            Welcome! You're logged in as
            <?= auth()->user()->name ?> | 
            <a href="/console/logout">Log Out</a> | 
            <a href="/console/dashboard">Dashboard</a> | 
            <a href="/">HomePage</a>
        <?php else: ?>
                <a href="/">Return to My HomePage</a>
        <?php endif; ?>
    </header>

    <?php if(session()->has('message')): ?>

        <div>
            <div>
                <?= session()->get('message')?>
            </div>
        </div>
    <?php endif?>

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

</body>
</html>