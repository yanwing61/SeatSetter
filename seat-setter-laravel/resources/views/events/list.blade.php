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
        <h1>SeatSetter Dashboard</h1>

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
        
            <h2>Manage Events</h2>
            <table>
                <tr>
                    <th>Event Name</th>
                    <th></th>
                    <th></th>
                </tr>
            <?php foreach($events as $event): ?>
                <tr>
                    <td>{{$event->event_name}}</td>
                    <td><a href="/console/events/edit/{{$event->event_id}}">Edit</a></td>
                    <td><a href="/console/events/delete/{{$event->event_id}}">Delete</a></td>
                </tr>
            <?php endforeach; ?>
            </table>

    <a href="/console/events/add">New Event</a>


    </section>

</body>
</html>