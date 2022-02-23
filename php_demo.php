<html>
    <head>
        <title>PHP</title>
        <link rel="stylesheet" href="css/main.css" />
    </head>
    <body>
        <h1>Привет!!!</h1>
        <?php
            $x = 2;
            $y = 2;
            $z = $x + $y;
            date_default_timezone_set("Europe/Moscow");
            $now = date("H:i:s");
            echo "Результат: $x + $y = $z";
            echo "$now";
        ?>
        <?php
            
        ?>
    </body>
</html>