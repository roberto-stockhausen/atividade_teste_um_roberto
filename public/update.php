<?php
session_start();
include("components/validate.php");
include("../infra/db/connect.php");

$AltUsuario = $_GET['id'];

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if (isset($_POST['update'])){
    $AltNovoUsuario = $_POST['NovoNome'];
    $AltNovaSenha = $_POST['NovaSenha'];

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
    if (isset($_POST['delete'])){
    include("components/delete.php");
    }

};
?>

<h4> Alterar Usuário <?php echo $AltUsuario; ?> </h4>
    <form method="POST">
            <label> Novo Nome: </label>
            <input type="text" name="NovoNome">
            <br>
            <label> Nova Senha: </label>
            <input type="text" name="NovaSenha">
            <br>
            <button type="submit" name="update"> Atualizar </button>
    </form>