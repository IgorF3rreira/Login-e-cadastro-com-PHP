<?php
include_once 'conexao.php';

if (isset($_POST['submit'])) {
    $email = ($_POST['email']);
    $senha = hash('sha256', $_POST['senhaNova']) ;


    //PARA SE HOUVER ALGUM CAMPO VAZIO
    if (empty($email) || empty($senha)) {
        echo '<script>
            alert("Preencha todos os campos!!");
            </script>';

        echo '<script>
            history.go("-1");
            </script>';
    } else {

        $sql = 'SELECT * FROM usuarios  WHERE email = :email ';
        $query = $bd->prepare($sql);
        $query->bindParam(':email', $email);
        $query->execute();
        $resultado = $query->fetchAll(pdo::FETCH_ASSOC);
        if (count($resultado) <= 0) {
            echo '<script>
                alert("E-mail não cadastrado!!");
            </script>';

            echo '<script>
            history.go("-1");
            </script>';
        } else {

            $up = 'UPDATE usuarios SET senha = ? WHERE email = ?';

            try {
                $query = $bd->prepare($up);
                $query->execute(array($senha, $email));
                echo '<script>
                    alert("Senha alterada com sucesso !!");
                </script>';

                echo '<script>
                history.go("-2");
                </script>';
            } catch (PDOException $e) {
                echo $e->getMessage();
            }


        }
    }

}











?>