<?php
session_start(); 
if(!isset($_SESSION["usuario"])){
    header("Location: ../index.php");
    exit();
}

include("../infra/db/connect.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if (isset($_POST['criar'])){
    $novoUsuario = $_POST['usuario'];
    $novaSenha = $_POST['senha'];

    $sql = "INSERT INTO usuarios (usuario,senha) 
    VALUES ('$novoUsuario','$novaSenha')";  

    if($conn->query($sql) === TRUE){
        echo "<script> alert('Usuário cadastrado com sucesso!')</script>";
    }else{
        echo "<script> alert('Erro ao cadastrar')</script>";
    }
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
    <h4> Alterar Usuário </h4>
    <form method="POST">
            <label> Usuário: </label>
            <input type="text" name="usuario2">
            <br>
            <label> Senha: </label>
            <input type="text" name="senha2">
            <br>
            <label> Novo Nome: </label>
            <input type="text" name="NovoNome">
            <br>
            <label> Nova Senha: </label>
            <input type="text" name="NovaSenha">
            <br>
            <button type="submit" name="update"> Atualizar </button>
    </form>
    <hr>
    <h4> Excluir Usuário </h4>
    <form method="POST">
            <label> Usuário: </label>
            <input type="text" name="ExcluirNome">
            <br>
            <label> ID: </label>
            <input type="text" name="ExcluirId">
            <br>
            <button type="submit" name="delete"> Excluir </button>
    </form>
    <hr>
    <?php
    
    include("components/table.php")

    ?>



</body>
</html>