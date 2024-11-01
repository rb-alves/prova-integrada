
<div>
    <a href="../public/index.php/controller=questao">Lista</a>
</div>


<form action="#" method="POST">
    <div>
        <label for="enunciado">Enunciado</label>
        <input type="text" id="enunciado" name="enunciado" value="<?=$questao['enunciado']?>">
    </div>
    <div>
        <label for="opcao_a">Opçao A</label>
        <input type="text" id="opcao_a" name="opcao_a" value="<?=$questao['opcao_a']?>">
    </div>
    <div>
        <label for="opcao_b">Opçao B</label>
        <input type="text" id="opcao_b" name="opcao_b" value="<?=$questao['opcao_b']?>">
    </div>
    <div>
        <label for="opcao_c">Opçao C</label>
        <input type="text" id="opcao_c" name="opcao_c" value="<?=$questao['opcao_c']?>">
    </div>
    <div>
        <label for="opcao_d">Opçao D</label>
        <input type="text" id="opcao_d" name="opcao_d" value="<?=$questao['opcao_d']?>">
    </div>
    <div>
        <label for="opcao_e">Opçao E</label>
        <input type="text" id="opcao_e" name="opcao_e" value="<?=$questao['opcao_e']?>">
    </div>
    <div>
        <label for="resposta">Resposta</label>
        <input type="text" id="resposta" name="resposta" value="<?=$questao['resposta']?>">
    </div>
    <div>
        <label for="nivel_dificuldade">Nível de Dificuldade</label>
        <input type="text" id="nivel_dificuldade" name="nivel_dificuldade" value="<?=$questao['nivel_dificuldade']?>">
    </div>
    <div>
        <label for="disciplina">Disciplina</label>
        <input type="text" id="disciplina" name="disciplina" value="<?=$questao['disciplina_id']?>">
    </div>
    <div>
        <label for="professor">Professor</label>
        <input type="text" id="professor" name="professor" value="<?=$questao['professor_id']?>">
    </div>
    <div>
        <label for="data_criacao">Data Criação</label>
        <input type="text" id="data_criacao" name="data_criacao" value="<?=$questao['data_hora_criacao']?>">
    </div>

    <input type="submit" Value="Enviar">
</form>