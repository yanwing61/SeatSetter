<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeatSetter</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/app.css">

</head>
<body>
    <header>
        <h1>SeatSetter Dashboard</h1>

        <?php if(Auth::check()): ?>
            <nav> 
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a href="/console/dashboard">Dashboard</a>
                    </li> 
                    <li class="nav-item">
                        <a href="/">FAQ</a>
                    </li> 
                    <li class="nav-item">
                        <a href="/console/logout">Log Out</a>
                    </li>
                </ul>
            </nav>

        <p>
            Welcome! You're logged in as
            <?= auth()->user()->name ?>
        </p>

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

    @yield ('content')

    <footer id="footer">
      <div id="footer-copyright">
        &copy; Copyright Yan Wing Pang, 2023.
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="/app.js"></script>
</body>
</html>