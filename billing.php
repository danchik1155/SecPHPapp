<?php
    session_start();

    if (!isset($_SESSION["user"])){
        echo '<meta http-equiv="refresh" content="2; URL=login.php">';
        die("Требуется логин! Вы будете перенапралены");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing</title>
    <link rel="stylesheet" href="css/main.css" />
    <style>
        table{
            width: 30%;
        }
        tr:nth-child(even){
            background-color: lightgray;
        }

        td:nth-child(1){
            text-align: right;
        }
        td:nth-child(2){
            text-align: right;
        }
        td:nth-child(3){
            text-align: center;
        }
    </style>
    <script>
        function toggleTable(){
            if (document.getElementById("lnkToggle").textContent=="Спрятать"){
                document.getElementById("tbCalcs").style.display="none";
                document.getElementById("lnkToggle").innerText="Показать";
            }
            else{
                document.getElementById("tbCalcs").style.display="";
                document.getElementById("lnkToggle").innerText="Спрятать";
            }

        }
    </script>
</head>
<body>
    <?php
    $user_name = $_SESSION["user"];
    echo "<h1> Ваш счёт , $user_name</h1>";
    ?>
    <a onclick="toggleTable();" id ="lnkToggle">Спрятать</a>
    <table border="1" id="tbCalcs">
    <tr>
    <td>Первое число</td><td>Второе число</td><td>Операция</td>
    </tr>
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

            // var_dump($result);

            for ($i=0; $i < count($result); $i++) { 
                echo "<tr>";
                echo"<td>".$result[$i][1]. "</td><td>". $result[$i][2]."</td><td>". $result[$i][3]."</td>";
                echo "</tr>";
            }

            echo "<h2> Вы должны $i \$</h2>"
    ?>
</table>

<a href="index.html">Домой</a> </br>
</body>
</html>