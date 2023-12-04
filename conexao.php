<?php
    define('HOST', 'localhost');
    define('DB', 'loginecadastro');
    define('USER', 'root');
    define('PASS', '');

    $dsn = 'mysql:host=' . HOST . ';dbname=' . DB;

    try {
        $bd = new PDO($dsn, USER, PASS);
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
?>