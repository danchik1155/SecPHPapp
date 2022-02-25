<?php
    session_start();

    if (isset($_SESSION["user"])){
        echo '<meta http-equiv="refresh" content="2; URL=login.php">';
        die("Вы уже авторизованы");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/main.css" />
</head>
<body>
    <h1> Login, please! </h1>
    <form method="post" action="API/check_login.php">
        <input name="user"/> <br/>
        <input name="pwd" type="password"/> <br/>
        <button> Submit </button>
    </form>
    <a href="register.php">Зарегистрироваться</a> </br>
</body>
</html>

