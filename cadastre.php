<?php 
include_once 'conexao.php';

if(isset($_POST['submit'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // VERIFICAR SE ESTA PREENCHIDO OS CAMPOS
    if(empty($nome) || empty($email) || empty($senha)){
        echo '<script>
            alert("Preencha todos os campos !");
        </script>';

        echo '<script>
        history.go("-1");
        </script>';
    }else{

        $sql = 'SELECT * FROM usuarios WHERE email = :email';
        $query = $bd->prepare($sql);
        $query->bindParam(':email', $email);
        $query->execute();
        $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
        if(count($usuarios) >0){
            echo '<script>
                alert("Email ja cadastrado !!")
            </script>';
            echo '<script>
            history.go("-1");
            </script>';
        }else{
            $up = 'INSERT INTO usuarios  (nome, email,senha) VALUES (:nome, :email, :senha)';

            try{
                $query = $bd->prepare($up);
                $query->bindValue('nome', $nome, PDO::PARAM_STR);
                $query->bindValue('email', $email, PDO::PARAM_STR);
                $query->bindValue('senha', hash('sha256', $senha));
                $query->execute();

                echo '<script>
                    alert("Cadastro feito com sucesso !");
                </script>';
                echo '<script>
                history.go("-2");
                </script>';
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }

    }


}