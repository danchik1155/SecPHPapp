<?php

session_start();

if (!isset($_SESSION["user"])){
    echo '<meta http-equiv="refresh" content="2; URL=app/login.php">';
    die("Требуется логин! Вы будете перенапралены");
}
include("../../../params/billing.php");
$conn = mysqli_connect($db_server, $db_user, $db_pwd, "billing");
#$sql = "SELECT * FROM calcs WHERE login=? AND Pwdhash=?;";
$sql = "SELECT * FROM calcs WHERE UserID=?;";
$statement = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($statement, "s", $_SESSION["user"]);
mysqli_stmt_execute($statement);
$cursor = mysqli_stmt_get_result($statement);
$result = mysqli_fetch_all ($cursor);
mysqli_close($conn);

echo(json_encode($result));