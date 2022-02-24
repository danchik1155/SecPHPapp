<?php
    session_start();

    if (!isset($_SESSION["user"])){
        echo '<meta http-equiv="refresh" content="2; URL=login.php">';
        die("Требуется логин! Вы будете перенапралены");
    }

    include("../../params/billing.php");
    $conn = mysqli_connect($db_server, $db_user, $db_pwd, "billing");
    $sql = "SELECT * FROM users WHERE login=? AND Pwdhash=?;";
    $statement = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($statement, "ss", $user, $hpwd);
    mysqli_stmt_execute($statement);
    $cursor = mysqli_stmt_get_result($statement);
    $result = mysqli_fetch_all ($cursor);
    mysqli_close($conn);

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
    <h1> Ваш счёт </h1>
    
    <?php
            include("../../params/billing.php");
            $conn = mysqli_connect($db_server, $db_user, $db_pwd, "billing");
            #$sql = "SELECT * FROM calcs WHERE login=? AND Pwdhash=?;";
            $sql = "SELECT * FROM calcs WHERE UserID=?;";
            $statement = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($statement, "s", $_SESSION["user"]);
            mysqli_stmt_execute($statement);
            $cursor = mysqli_stmt_get_result($statement);
            $result = mysqli_fetch_all ($cursor);
            mysqli_close($conn);

            var_dump($result);

            for ($i=0; $i < count($result); $i++) { 
                echo($result[$i][4]. "<br/>");
            }

    ?>

</body>
</html>