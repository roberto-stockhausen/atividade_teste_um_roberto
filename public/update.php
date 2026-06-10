<?php
session_start();
include("components/validate.php");
include("../infra/db/connect.php");

$AltUsuario = $_GET['id'];

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if (isset($_POST['update'])){
    $AltNovoUsuario = $_POST['NovoNome'];
    $AltNovaSenha = $_POST['NovaSenha'];
    $AltNovaSenhaConfirm = $_POST['NovaSenhaConfirm'];

    if ($AltNovoUsuario != null && $AltNovaSenha != null){
    if ($AltNovaSenha == $AltNovaSenhaConfirm){
    
    $sql = "SELECT * FROM usuarios WHERE usuario = '$AltNovoUsuario'";
    $Exists = $conn->execute_query($sql);

    if($Exists->num_rows > 0) {
    echo "<script> alert('Usuário já existe') </script>";    
    }
    else
    {
    $sql = "UPDATE usuarios 
    SET usuario = '$AltNovoUsuario', senha = '$AltNovaSenha' 
    WHERE id = '$AltUsuario';";

    if($conn->query($sql) === TRUE){
        echo "<script> alert('Usuário alterado com sucesso!')</script>";
        header("Location: home.php");
        exit();
    }else{
        echo "<script> alert('Erro ao alterar')</script>";
    }
    }
    }
    else{
    echo "<script> alert('senha e confirmação de senha devem ser iguais!') </script>";   
    }
    }
    else{
    echo "<script> alert('preencha todos os campos!') </script>";
    }
    };
    }
?>

<h4> Alterar Usuário <?php echo $AltUsuario; ?> </h4>
    <form method="POST">
            <label> Novo Nome: </label>
            <input type="text" name="NovoNome">
            <br>
            <label> Nova Senha: </label>
            <input type="text" name="NovaSenha">
            <br>
            <label> Confirmar Senha: </label>
            <input type="text" name="NovaSenhaConfirm">
            <br>
            <button type="submit" name="update"> Atualizar </button>
    </form>