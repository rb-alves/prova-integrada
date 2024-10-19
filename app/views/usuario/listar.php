<h1>Lista de Usuários</h1>

<table>
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">CPF</th>
            <th scope="col">Email</th>
            <th scope="col">Senha</th>
            <th scope="col">Perfil</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            
            if(count($usuarios) > 0):
                foreach ($usuarios as $usuario) {
                    $nome = $usuario["nome"];
                    $cpf = $usuario["cpf"];
                    $email = $usuario["email"];
                    $senha = $usuario["senha"];
                    $perfil = $usuario["perfil"];

                    echo "
                    <tr>
                        <td>$nome</td>
                        <td>$cpf</td>
                        <td>$email</td>
                        <td>$senha</td>
                        <td>$perfil</td>
                    </tr>
                    ";
                }
            else:
                echo "
                    <tr>
                        <td>Não existem usuários cadastrados</td>
                    </tr>
                ";
            endif;
        ?>
    </tbody>
</table>