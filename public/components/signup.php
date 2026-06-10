<?php
$novoUsuario = $_POST['usuario'];
$novaSenha = $_POST['senha'];
$novaSenhaConfirm = $_POST['senhadenovo'];

if ($novoUsuario != null && $novaSenha != null && $novaSenhaConfirm != null){
    if ($novaSenha == $novaSenhaConfirm){
    $sql = "SELECT * FROM usuarios WHERE usuario = '$novoUsuario'";
    $Exists = $conn->execute_query($sql);

    if($Exists->num_rows > 0) {
    echo "<script> alert('Usuário já existe') </script>";    
    }
    else{

    $sql = "INSERT INTO usuarios (usuario,senha) 
    VALUES ('$novoUsuario','$novaSenha')";  

    if($conn->query($sql) === TRUE){
        echo "<script> alert('Usuário cadastrado com sucesso!')</script>";
    }else{
        echo "<script> alert('Erro ao cadastrar')</script>";
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
?>