
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="css/main.css" />
    <script>
        function validate(){
            if (document.getElementById("pass1").value!=document.getElementById("pass2").value){
                document.getElementById("SubButton").innerText="Пароли не совпадают";

                sovpass = false;
                // document.getElementById("SubButton").disabled=true;
            }
            else{
                document.getElementById("SubButton").innerText="Submit";

                sovpass = true;
                // document.getElementById("SubButton").disabled=false;
            }

            if(document.getElementById("pass1").value==""){
                document.getElementById("alertpdw").innerText="Пароль не может быть пустым";
                document.getElementById("alertpdw").style.color="red";
                document.getElementById("alertpdw").style.display="";

                nepass = false;
                // document.getElementById("SubButton").disabled=true;
            }
            else{
                document.getElementById("alertpdw").innerText="";
                document.getElementById("alertpdw").style.display="none";

                nepass = true;
                // document.getElementById("SubButton").disabled=false;
            }

            document.getElementById("SubButton").disabled= !(nepass && sovpass);
            console.log(nepass && sovpass)
        }
    </script>
</head>
<body>
    <a href="index.html">Домой</a> </br>
    <h1> Form for registration </h1>
    <form method="post" action="API/registration.php">
        <input name="user"/> <br/>
        Введите пароль <br/>
        <input name="pwd" onkeyup="validate();" type="password" id="pass1"/> <br/>
        <div id="alertpdw"></div>
        Повторите пароль <br/>
        <input name="pwd2" onkeyup="validate();" type="password" id="pass2"/> <br/>
        <button id="SubButton"> Submit </button>
    </form>

</body>
</html>

