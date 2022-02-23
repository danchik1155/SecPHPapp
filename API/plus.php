<?php
session_start();
$x = $_REQUEST["x"];
$y = $_REQUEST["y"];

// Нарушения безопасности
// 1. Слабый пароль

include("../../../params/billing.php");
$conn = mysqli_connect($db_server, $db_user, $db_pwd, "billing");
$userid = $_SESSION["user"];
$sql = "INSERT INTO calcs (Number1, Number2, Operation, UserID) VALUES ($x, $y, 'plus', '$userid');";
mysqli_query($conn, $sql);

mysqli_close($conn);

$z = $x + $y;
echo $z;