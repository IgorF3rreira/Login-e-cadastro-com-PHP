<?php
include_once "conexao.php";

    if(isset($_POST['submit'])){
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $senha = isset($_POST['senha']) ? $_POST['senha'] : null;
    $senhaCrypto = hash('sha256', $senha);

    //PARA SE HOUVER ALGUM CAMPO VAZIO
    if (empty($email) || empty($senha)) {
        echo '<script>
    alert("Preencha todos os campos para fazer seu login");
    </script>
    ';
        echo'<script>
                history.go("-1");
        </script>';
        // echo ' <meta http-equiv="refresh" content="0">';
    } else {

        //PARA CASO NÃO ACHAR NO BANCO DE DADOS 
        $sql ='SELECT * FROM usuarios WHERE email = :email AND senha = :senha';
        $query = $bd->prepare($sql);
        $query->bindParam(':email', $email);
        $query->bindParam(':senha', $senhaCrypto);
        $query->execute();
        $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
        if (count($usuarios) <= 0) {
            echo '<script>
        alert("Usuario ou senha invalido !!");
        </script>
        ';

        echo'<script>
        history.go("-1");
            </script>'; 
        } else {
            header('Location: logado.php');

            //CASO ENCONTRE O USUARIO E A SENHA NO BANCO DE DADOS
            $usuario = $usuarios[0];
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['logado'] = true;
            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            $_SESSION['nome'] = $usuario['nome'];
        }

    }

}
?>