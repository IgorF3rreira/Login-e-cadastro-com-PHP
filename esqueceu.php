<?php 
include_once 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Esqueceu sua senha</title>
</head>
<body>

    <div id="container">
        <div id="container2">
            <form action="resetSenha.php" method="post" name="form1" id="form1">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email">

               <label  style="left:35%" for="senhaNova">nova senha</label>
                <input type="password" name="senhaNova" id="senhaNova">

    

                <button type="submit" id="submit" name="submit">Alterar</button>

                <a href="index.php">Voltar </a>
            </form>

           
        </div>
    </div>

</body>
</html>