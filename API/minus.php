<?php
session_start();
$x = $_REQUEST["x"];
$y = $_REQUEST["y"];

include("../../../params/billing.php");
$conn = mysqli_connect($db_server, $db_user, $db_pwd, "billing");
$userid = $_SESSION["user"];
$today = date('Y-m-d H:i:s');
$sql = "INSERT INTO calcs (Number1, Number2, Operation, UserID, Timestamp) VALUES ($x, $y, 'minus', '$userid', '$today');";
mysqli_query($conn, $sql);

mysqli_close($conn);

$z = $x - $y;
echo $z;