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

    <section>
        <ul id="list">
            <li><a href="/console/users/list">Manage Users</a></li>
            <li><a href="/console/events/list">Manage Events</a></li>
            <li><a href="/console/groups/list">Manage Groups</a></li>
            <li><a href="/console/tables/list">Manage Tables</a></li>
            <li><a href="/console/guests/list">Manage Guests</a></li>
            <li><a href="/console/seating/seating">Seating plan</a></li>

        </ul>
    </section>

</body>
</html>