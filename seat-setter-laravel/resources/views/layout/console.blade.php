<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeatSetter</title>

    <link rel="icon" href="/chair.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/app.css">

</head>
<body>
    <header>
        <h1>SeatSetter &#129681;</h1>

        <?php if(Auth::check()): ?>
            <nav> 
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a href="/console/dashboard">&#129681; Dashboard</a>
                    </li> 
                    <li class="nav-item">
                        <a href="/console/about">&#129681; About</a>
                    </li> 
                    <li class="nav-item">
                        <a href="/console/logout">&#129681; Log Out</a>
                    </li>
                </ul>
            </nav>

        <p id="welcomeUser">
            Welcome! You're logged in as
            <?= auth()->user()->name ?>.
        </p>

        <?php else: ?>
                <p>Welcome! Please login.</p>
        <?php endif; ?>
    </header>
    
    <main>
        <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="info-fill" viewBox="0 0 16 16">
            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        </svg>

        <?php if(session()->has('message')): ?>

            <div id="message">
                <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                    <?= session()->get('message')?>
                </div>
            </div>
        <?php endif?>

        @yield ('content')

        @yield('links')
    
    </main>

    <footer id="footer">
      <div id="footer-copyright">
        &copy; Copyright Yan Wing Pang, 2023.
      </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="/app.js"></script>
</body>
</html>