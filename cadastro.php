<? 
include_once 'conexao.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <title>Cadastre-se</title>
</head>
<body>
    
    
<div id="container">

<div id="container2">

    <form action="cadastre.php" method="post" enctype="multipart/form-data">

    <label for="nome">Nome</label>
    <input type="text" name="nome" id="nome">

    <label for="email">E-mail</label>
    <input type="email" name="email" id="email">

    <label for="senha">Senha</label>
    <input type="password" name="senha" id="senha">

    <button type="submit" id="submit" name="submit">Acessar</button>

    </form>

   <a href="index.php"> <p>Voltar</p> </a>
</div>

</div>

</body>
</html>