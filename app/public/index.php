<?php
    // Faz a inclusão do header
    include "header.php";

    // Inclui o controlador de QUESTÕES
    require_once "../controllers/QuestaoController.php";

    // Criar uma instância do controlador QUESTÃO
    $controller = new QuestaoController();


    // Verifica se algum action foi passado na URL caso não ele é definido como LIST por padrão
    if(isset($_GET["action"])):
        $action = $_GET["action"];
    else:
        $action = "list";
    endif;


    // Verifica o tipo de ação a ser executada dependendo valor de action
    if($action == "list"):
        // Listar os usuários
        $questoes = $controller->listaQuestoes();
    
    elseif ($action == "create"): // Ação de cadastro
        // Chama o metodo de cadastro da controller
        $controller->cadastro();

    elseif ($action == "edit"): // Ação de Edição

        if(isset($_GET['id'])):
            // Atribui o ID  a uma variavel
            $id = $_GET['id'];

            // Chama o metodo de edição da controller
            $controller->edicao($id);
        else:
            // Caso o ID não seja definido na URL
            echo "ID da questão não foi definido";
        endif;
    
    elseif ($action == "del"): // Ação Delete
        if(isset($_GET['id'])):
            // Atribui o ID a uma variavel
            $id = $_GET['id'];

            // Chama o metodo de deletar da controller
            $controller->apagar($id);
        else:
            // Caso o ID não seja definido na URL
            echo "ID da questão não foi definido";
        endif;

    endif;



    // Faz a inclusão do footer
    include "footer.php";