<?php /* Opens php script */
    session_start();

    include("infra/db/connect.php"); /* includes the php file that connects to the sql server */

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $usuario = $_POST["usuario"]; /* Declares two variables and inserts the values given by the user in the html form */
        $senha = $_POST["senha"];
        
        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
        /* Declares a variable with sql code inside */

        $resultado = $conn->query($sql); /* Creates a variable using query with the sql code inside the $sql file */

        if ($resultado->num_rows > 0){ /* If it finds a corresponding user and passwords, sends to home. Otherwise, declare the erro variable */
            $_SESSION["usuario"] = $usuario;
            header("Location: public/home.php");
            exit();
        }else{
            $erro = "Usuário ou senha inválidos!";
        }
    }
?>

<html lang="en"> <!-- Now for the actual HTML login form-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Sitema de Login Simples</h1>

    <form method="POST">
        <label>Usuário:</label>
        <input type="text" name="usuario">
        <br>
        <label>Senha:</label>
        <input type="password" name="senha">
        <br>
        <?php
        
            if(isset($erro)){ /* If the erro variable is declared, show it below the login spaces */
                echo $erro;
            };
        
        ?>
        <br>
        <button type="submit">Entrar</button>
    </form>

</body>
</html>