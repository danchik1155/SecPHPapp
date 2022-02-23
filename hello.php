<html>
    <head>
        <title>PHP</title>
        <link rel="stylesheet" href="css/main.css" />
    </head>
    <body>
    <a href="index.html">Домой</a> </br>
        <?php
            date_default_timezone_set("Europe/Moscow");
            $now = date("H");
            if ($now < 5 or $now >= 21)
                echo "<h1>Доброй ночи!</h1>";
            if ($now >= 5 and $now < 12)
                echo "<h1>Доброе утро!</h1>";
            if ($now >= 12 and $now < 16)
                echo "<h1>Добрый день!</h1>";
            if ($now >= 16 and $now < 21)
                echo "<h1>Добрый вечер!</h1>";
        ?>
        <?php
            
        ?>
    </body>
</html>