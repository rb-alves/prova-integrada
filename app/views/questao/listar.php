<h1>Lista de Questões</h1>

<a href="../public/index.php?action=create">Cadastrar</a>

<table>
    <thead>
        <tr>
            <th scope="col">Enunciado</th>
            <th scope="col">Opção A</th>
            <th scope="col">Opção B</th>
            <th scope="col">Opção C</th>
            <th scope="col">Opção D</th>
            <th scope="col">Opção E</th>
            <th scope="col">Resposta</th>
            <th scope="col">Nivel</th>
            <th scope="col">Disciplina</th>
            <th scope="col">Professor</th>
            <th scope="col">Criação</th>
            <th scope="col">Editar</th>
            <th scope="col">Excluir</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            
            if(count($questoes) > 0):
                foreach ($questoes as $questao) {
                    $id = $questao['id'];
                    $enunciado = $questao["enunciado"];
                    $opcao_a = $questao["opcao_a"];
                    $opcao_b = $questao["opcao_b"];
                    $opcao_c = $questao["opcao_c"];
                    $opcao_d = $questao["opcao_d"];
                    $opcao_e = $questao["opcao_e"];
                    $resposta = $questao["resposta"];
                    $nivel_dificuldade = $questao["nivel_dificuldade"];
                    $disciplina = $questao["disciplina_id"];
                    $professor = $questao["professor_id"];
                    $data_hora_criacao = $questao["data_hora_criacao"];

                    echo "
                    <tr>
                        <td>$enunciado</td>
                        <td>$opcao_a</td>
                        <td>$opcao_b</td>
                        <td>$opcao_c</td>
                        <td>$opcao_d</td>
                        <td>$opcao_e</td>
                        <td>$resposta</td>
                        <td>$nivel_dificuldade</td>
                        <td>$disciplina</td>
                        <td>$professor</td>
                        <td>$data_hora_criacao</td>
                        <td>
                            <a href='../public/index.php?action=edit&id=".$id."'>$id</a>
                        </td>
                        <td>
                            <a href='../public/index.php?action=del&id=".$id."'>$id</a>
                        </td>
                    </tr>
                    ";
                }
            else:
                echo "
                    <tr>
                        <td>Não existem questões cadastradas</td>
                    </tr>
                ";
            endif;
        ?>
        <a href=""></a>
    </tbody>
</table>