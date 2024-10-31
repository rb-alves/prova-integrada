<h1>Lista de Usuários</h1>

<div>
    <a href="../public/index.php?controller=usuario&action=create">Cadastrar Usuarios</a>
</div>

<table>
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">CPF</th>
            <th scope="col">Email</th>
            <th scope="col">Telefone</th>
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
                    $telefone = $usuario["telefone"];
                    $senha = $usuario["senha"];
                    $perfil = $usuario["perfil"];

                    echo "
                    <tr>
                        <td>$nome</td>
                        <td>$cpf</td>
                        <td>$email</td>
                        <td>$telefone</td>
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