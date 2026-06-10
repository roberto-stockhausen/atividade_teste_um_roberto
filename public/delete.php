<?php
session_start();
include("../public/components/validate.php");
include("../infra/db/connect.php");
$id = $_GET["id"];

if($_SERVER["REQUEST_METHOD"] == "POST"){

$sql = " DELETE FROM usuarios WHERE id = $id ";

if($conn->query($sql) === TRUE){
header("Location: home.php");
exit();
}
}
?>

<h4> Excluir Usuário <?php echo $id; ?> ? </h4>
    <form method="POST">
            <button type="submit" name="update"> Confirmar </button>
    </form>