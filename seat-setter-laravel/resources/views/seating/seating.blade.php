<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/app.css">
 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
    

    <title>Seating Plan</title>
</head>
<body>
    <header>
        <h1>SeatSetter</h1>
        <h2>Seating Plan</h2>

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
    <div id="seating-plan-con">
        <div id="names">
            <div id="name1" class="draggable ui-widget-content" data-name="Jane">
                <p>Jane</p>
            </div>

            <div id="name2" class="draggable ui-widget-content">
                <p>Ken</p>
            </div>

            <div id="name3" class="draggable ui-widget-content">
                <p>Barbie</p>
            </div>

            <div id="name4" class="draggable ui-widget-content">
                <p>Katy</p>
            </div>

            <div id="name5" class="draggable ui-widget-content">
                <p>Mary</p>
            </div>
        </div>

        <div id="tables">
            <div id="table1" class="droppable ui-widget-header">
                <p>Table 1</p>
            </div>

            <div id="table2" class="droppable ui-widget-header">
                <p>Table 2</p>
            </div>

            <div id="table3" class="droppable ui-widget-header">
                <p>Table 3</p>
            </div>

            <div id="table4" class="droppable ui-widget-header">
                <p>Table 4</p>
            </div>
        </div>
    </div>

    <script src="/app.js"></script>
    </section>
</body>
</html>
