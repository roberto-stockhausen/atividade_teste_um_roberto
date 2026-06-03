<?php
    /* Defines variables used to connect with database */
    $host = "localhost";
    $user = "root";
    $pass = "root";
    $db = "sistema_simples_m1_roberto";

    $conn = new mysqli($host,$user,$pass,$db); /* Connects to MySQL using said variables */

    if($conn->connect_error){
        die("Erro na conexão!"); /* Mensagem de erro */
    }else{
        echo "<script>console.log('Banco conectado com sucesso!')</script>"; /* Does a console
        log to show the connection worked */
    };

?>