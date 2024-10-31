<?php
    // Faz a inclusão do header
    include "header.php";

    // Inclui o controladores
    require_once "../controllers/QuestaoController.php";
    require_once "../controllers/UsuarioController.php";

    // Cria instancias dos controllers
    $controllerQuestao = new QuestaoController();
    $controllerUsuario = new UsuarioController();


    // Verifica se algum action foi passado na URL caso não ele é definido como LIST por padrão
   $controller = isset($_GET["controller"]) ? $_GET["controller"] : "questao";
   $action = isset($_GET["action"]) ? $_GET["action"]: "list";


    // Verifica qual o controller está definida
    switch ($controller) {
        // Caso a controller seja questão
        case 'questao':
                if($action == "list"):
                    // Listar as questoes
                    $questoes = $controllerQuestao->listaQuestoes();
                
                elseif ($action == "create"): // Ação de cadastro
                    // Chama o metodo de cadastro da controller
                    $controllerQuestao->cadastro();
            
                elseif ($action == "edit"): // Ação de Edição
            
                    if(isset($_GET['id'])):
                        // Atribui o ID  a uma variavel
                        $id = $_GET['id'];
            
                        // Chama o metodo de edição da controller
                        $controllerQuestao->edicao($id);
                    else:
                        // Caso o ID não seja definido na URL
                        echo "ID da questão não foi definido";
                    endif;
                
                elseif ($action == "del"): // Ação Delete
                    if(isset($_GET['id'])):
                        // Atribui o ID a uma variavel
                        $id = $_GET['id'];
            
                        // Chama o metodo de deletar da controller
                        $controllerQuestao->apagar($id);
                    else:
                        // Caso o ID não seja definido na URL
                        echo "ID da questão não foi definido";
                    endif;
                endif;        
            break;

        // Caso o controller seja USUARIO
        case 'usuario':
            if ($action == 'list'):
                // Lista os usuários
                $usuarios = $controllerUsuario->listaUsuarios();

            elseif ($action == 'create'): // Ação de cadastro
                // Chama o metodo de cadastro da controller
                $controllerUsuario->cadastro();
            endif;
            break;
        default:
            # code...
            break;
    }
    


    // Faz a inclusão do footer
    include "footer.php";