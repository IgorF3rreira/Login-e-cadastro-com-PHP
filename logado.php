<?php
session_start();
include_once "conexao.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <title>Logado</title>



    <style>
        body{
            background-color: black;
            color: white;
        }

        #aguarde {
            width: 400px;
            height: 300px;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -150px;
            margin-left: -200px;
            mix-blend-mode: multiply;

        }

        #site {
            display: none;
       
        }
        div{
           margin-top: 20%;
        }

        button {
            width: 150px;
            height: 60px;
            background-color: red;
            display: block;
            margin: 0px auto;
            cursor: pointer;
        }
    </style>

</head>

<body>

    <div id="aguarde">
    </div>

    <Main id="site">

        <h2 style="text-align: center">Olá <b> <?php echo $_SESSION['nome']; ?>    </b></h2>

        <div>
           
            <a href="logoff.php"> <button> LOGOFF</button> </a>
        
        </div>
    </Main>




    <script type="text/javascript">
        $(document).ready(function () {
            $('#aguarde').delay(2000).fadeOut('slow');
            $('#site').delay(2000).fadeIn('slow');
        })
    </script>

</body>

</html>

