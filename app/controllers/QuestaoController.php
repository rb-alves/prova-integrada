<?php

    require_once "../models/Questao.php";

    class QuestaoController {
        private $questao; // Objeto da classe Questão

        // Construtor usado para instanciar a classe QUESTÃO que será ultlizada pelos metodos
        public function __construct(){
            $this->questao = new Questao;
        }
        
        // Lista todas as questoes da tabela
        public function listaQuestoes(){
            $questoes = $this->questao->exibir(); // Chama o metodo EXIBIR
            include "../views/questao/listar.php"; // Inclui a tabela de questões
        }

        // Cria uma nova questão
        public function cadastro(){
           
            // Verifica se o metodo de requisição é do tipo POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                // Envia os dados recuperados via POST para os seus devidos atributos
                $this->questao->setEnunciado($_POST['enunciado']);
                $this->questao->setOpcaoA($_POST['opcao_a']);
                $this->questao->setOpcaoB($_POST['opcao_b']);
                $this->questao->setOpcaoC($_POST['opcao_c']);
                $this->questao->setOpcaoD($_POST['opcao_d']);
                $this->questao->setOpcaoE($_POST['opcao_e']);
                $this->questao->setResposta($_POST['resposta']);
                $this->questao->setNivel($_POST['nivel_dificuldade']);
                $this->questao->setDisciplina($_POST['disciplina']);
                $this->questao->setProfessor($_POST['professor']);
                $this->questao->setData($_POST['data_criacao']);

                // Chama o metodo CADASTRAR para registrar os dados no banco
                $this->questao->cadastrar();
                
                // Retorna a lista de questões
                header("Location: ../public/index.php");
            }else{
                // Inclui o formulário de cadastro na pagina
                include "../views/questao/criar.php";
            }
        }


        // Edita uma questão cadastrada
        public function edicao($id){
            // Verifica se o metodo de requisição é do tipo POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                // Envia os dados recuperados via POST para os seus respectivos atributos
                $this->questao->setID($id);
                $this->questao->setEnunciado($_POST['enunciado']);
                $this->questao->setOpcaoA($_POST['opcao_a']);
                $this->questao->setOpcaoB($_POST['opcao_b']);
                $this->questao->setOpcaoC($_POST['opcao_c']);
                $this->questao->setOpcaoD($_POST['opcao_d']);
                $this->questao->setOpcaoE($_POST['opcao_e']);
                $this->questao->setResposta($_POST['resposta']);
                $this->questao->setNivel($_POST['nivel_dificuldade']);
                $this->questao->setDisciplina($_POST['disciplina']);
                $this->questao->setProfessor($_POST['professor']);
                $this->questao->setData($_POST['data_criacao']);

                // Chama o metodo ATUALIZAR para editar os dados no banco
                $this->questao->atualizar();

                // Retorna a lista de questões
                header("Location: ../public/index.php");

            }else{
                $questao = $this->questao->buscaQuestaoID($id);
                include "../views/questao/editar.php";
            }

        }

        // Exclui uma questão da tabela
        public function apagar($id){
            // Verifica se o metodo de requisição é do tipo POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $this->questao->setID($_POST['id']); // Define o valor do ID para realizar a exclusão

                // Chama o metodo DELETAR para apagar a questão do banco
                $this->questao->deletar();

                // Retorna a lista de questões
                header("Location: ../public/index.php");
            }else{
                $questao = $this->questao->buscaQuestaoID($id);
                include "../views/questao/deletar.php"; 
            }
            
        }



    }