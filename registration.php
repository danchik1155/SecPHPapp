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
    <?php

    $user = $_REQUEST["user"];
    $pwd = $_REQUEST["pwd"];
    $pwd2 = $_REQUEST["pwd2"];

    if ($pwd!=$pwd2){
        echo("Пароли не совпадают, Вы будете перенаправлены на страницу регистрации");
        die('<meta http-equiv="refresh" content="2; URL=register.php">');
    }

    include("../../params/billing.php");
        
    $hpwd = hash("sha256", $pwd);

    include("../../params/billing.php");
    $conn = mysqli_connect($db_server, $db_user, $db_pwd, "billing");
    
    $sql = "SELECT * FROM users WHERE login=?;";
    $statement = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($statement, "s", $user);
    mysqli_stmt_execute($statement);
    $cursor = mysqli_stmt_get_result($statement);
    $result = mysqli_fetch_all ($cursor);
    mysqli_close($conn);

    if (count($result) != 0){
        echo("Такой пользователь уже существует, Вы будете перенаправлены на страницу регистрации");
        die('<meta http-equiv="refresh" content="2; URL=register.php">');
    }

    $conn = mysqli_connect($db_server, $db_user, $db_pwd, "billing");
    $sql = "INSERT INTO users (login, Pwdhash) VALUES ( ?, ?);";
    $statement = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($statement, "ss", $user, $hpwd);
    mysqli_stmt_execute($statement);
    $cursor = mysqli_stmt_get_result($statement);
    // var_dump($statement);
    // var_dump($cursor);
    $result = $cursor;
    mysqli_close($conn);
    var_dump($result);

    if ($result==false)
    {
        $_SESSION["user"] = $user;
        echo "<h1>Welcome, $user!</h1>";
        echo "Сейчас вы будете перенаправлены на калькулятор";
        echo '<meta http-equiv="refresh" content="2; URL=calc.php">';
    }
    else{
        echo"$result";
        echo "Произошла ошибка при регистрации";
        die('<meta http-equiv="refresh" content="2; URL=register.php">');
    }

    //var_dump($result)

    // if (count($result) == 0)
    //     echo "Bad user";
    // else{
    //     echo "<h1>Welcome, $user!</h1>";
    //     echo "Сейчас вы будете перенаправлены на калькулятор";
    //     echo '<meta http-equiv="refresh" content="2; URL=calc.php">';
    //     $_SESSION["user"] = $user;
    // }
    ?>
</body>
</html>