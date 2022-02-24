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
    <title>Calculator</title>
    <link rel="stylesheet" href="css/main.css" />
    <style>
        input{
            margin-bottom: 10px;
            width: 170px;
            text-align: center;
        }

        button{
            margin-bottom: 10px;
            width: 85px;
        }

        div.centered{
            text-align: center;
        }
    </style>

    <script>
        function plus(){
            x = parseInt(document.getElementById("txtX").value);
            y = parseInt(document.getElementById("txtY").value);
            //z = x + y

            url = "api/plus.php?x=" + x + "&y=" + y;
            xhr = new XMLHttpRequest();
            xhr.open("GET", url, false);
            xhr.send();
            z = xhr.responseText;

            document.getElementById("txtZ").value = z;
        }
        function minux(){
            x = parseInt(document.getElementById("txtX").value);
            y = parseInt(document.getElementById("txtY").value);
            // z = x - y;
            
            url = "api/minus.php?x=" + x + "&y=" + y;
            xhr = new XMLHttpRequest();
            xhr.open("GET", url, false);
            xhr.send();
            z = xhr.responseText;

            document.getElementById("txtZ").value = z;
        }
    </script>

</head>

<body>

    <div class="centered">
        <a href="index.html">Домой</a> </br>
        <h1>Калькулятор</h1>
        <input id="txtX"/> <br/>
        <input id="txtY"/> <br/>
        <button onclick="plus();">+</button>
        <button onclick="minux();">-</button> <br/>
        <input id="txtZ">
        <br/>
        <a href="billing.php">Счёт</a> </br>
    </div>
    
</body>
</html>