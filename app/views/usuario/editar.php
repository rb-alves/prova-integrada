<div>
    <a href="../public/index.php?controller=usuario">Lista de Usuários</a>
</div>

<form action="#" method="POST">
    <div>
        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" value="<?=$usuario['nome']?>" required>
    </div>
    <div>
        <label for="cpf">CPF</label>
        <input type="text" id="cpf" name="cpf" value="<?=$usuario['cpf']?>" required>
    </div>
    <div>
        <label for="email">Email</label>
        <input type="text" id="email" name="email" value="<?=$usuario['email']?>" required>
    </div>
    <div>
        <label for="telefone">Telefone</label>
        <input type="text" id="telefone" name="telefone" value="<?=$usuario['telefone']?>" required>
    </div>
    <div>
        <label for="perfil">Perfil de Acesso</label>
        <select name="perfil" id="perfil" required>
            <option value="">Selecione...</option>
        </select>
    </div>
    <input type="submit" Value="Enviar">
</form>