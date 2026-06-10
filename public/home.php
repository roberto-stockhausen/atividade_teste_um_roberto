<?php
session_start();
include("components/validate.php");
include("../infra/db/connect.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if (isset($_POST['criar'])){
    include("components/signup.php");
    }

    if (isset($_POST['update'])){
    $AltUsuario = $_POST['usuario2'];
    $AltSenha = $_POST['senha2'];
    $AltNovoUsuario = $_POST['NovoNome'];
    $AltNovaSenha = $_POST['NovaSenha'];

    $sql = "UPDATE usuarios 
    SET usuario = '$AltNovoUsuario', senha = '$AltNovaSenha' 
    WHERE usuario = '$AltUsuario' AND senha = '$AltSenha';";

    if($conn->query($sql) === TRUE){
        echo "<script> alert('Usuário alterado com sucesso!')</script>";
    }else{
        echo "<script> alert('Erro ao alterar')</script>";
    }
    }
    if (isset($_POST['delete'])){
    include("components/delete.php");
    }

};

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h3>Bem-Vindo! <?php echo $_SESSION["usuario"]; ?></h3>
    <a href="logout.php"> Sair</a>

    <hr>
    <h4>Cadastro de Novo Usuário.</h4>
    <form method="POST">
        <label>Usuário:</label>
        <input type="text" name="usuario">
        <br>
        <label>Senha:</label>
        <input type="password" name="senha">
        <br>
        <?php
        
            if(isset($erro)){
                echo $erro;
            };
        
        ?>
        <br>
        <button type="submit" name="criar">Cadastrar</button>
    </form>
    <hr>

    <?php
    
    include("components/table.php")

    ?>



</body>
</html>