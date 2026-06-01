<h4>Usuários Cadastrados</h4> <!-- This is a component. It's an external php file that will 
be added inside another php file using "include". This one is a table that will be used
inside the "home" page to display connected users.-->

<table border="1" cellpadding="3">

    <tr>
        <th>ID</th> 
        <th>Usuário</th>
        <th>Senha</th>
    </tr>

    <?php
    
    $sqlTodosUsuarios = "SELECT * FROM usuarios";

    $resultadoTodosUsuarios = $conn->query($sqlTodosUsuarios);

    while($linha = $resultadoTodosUsuarios->fetch_assoc()){

    // o fetch assoc

        echo "  <tr>
                    <td>". $linha['id'] . "</td>
                    <td>". $linha['usuario'] . "</td>
                    <td>". $linha['senha'] . "</td>
                </tr>
        ";

    }
    
    ?>

    


</table>