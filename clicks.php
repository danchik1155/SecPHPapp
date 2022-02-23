<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="index.html">Домой</a> </br>
    <h1>Count clicks</h1>
    <form>
        <button>
            click
        </button>
    </form>

    <?php
    
    //$i = 0;
    // if (isset($_SESSION["clicks"]))
    // $i = $_SESSION["clicks"];
    // else
    // $i = 0;

    if (isset($_COOKIE["cliks"]))
        $i = $_COOKIE["cliks"];
    else
        $i = 0;

    $i += 1;

    echo "<h2>Clicks count: $i</h2>";
    setcookie("cliks", $i, time() + 20, "", "", true)
    // $_SESSION["clicks"] = $i;
    
    ?>
</body>
</html>