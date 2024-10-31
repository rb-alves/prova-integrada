<?php

    require_once "../models/Usuario.php";

    class UsuarioController {
        private $usuario; // Objeto da classe USUARIO

        // Construtor usado para instanciar a classe USUARIO que será ultlizada pelos metodos
        public function __construct() {
            $this->usuario = new Usuario();
        }
        
        // Lista todos os usuarios da tabela
        public function listaUsuarios(){
            $usuarios = $this->usuario->exibir(); // Chama o metodo EXIBIR
            include "../views/usuario/listar.php"; // Inclui a tabela de usuarios
        }

        // Cria um novo usuario
        public function cadastro(){
            // Verifica se o metodo de requisição é do tipo POST
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $usuario = new Usuario(); // Cria a instancia da classe USUARIO
                
                // Envia os dados recuperados via POST para os seus respectivos atributos
                $this->usuario->setNome($_POST["nome"]); 
                $this->usuario->setCPF($_POST["cpf"]);
                $this->usuario->setEmail($_POST["email"]);
                $this->usuario->setPerfil($_POST["perfil"]);
                $this->usuario->setTelefone($_POST["telefone"]);

                // Chama o metodo CADASTRAR para armazenar os dados no banco de dados
                $usuario->cadastrar();

                // Retorna para a lista de questões
                header("Location: ../public/index.php");
            }else{
                // Inclui o formulário de cadastro na pagina
                include "../views/usuario/criar.php";
            }
        }

        // Atualiza um registro 
        public function edicao($id){

            // Verifica se o metodo de requisição é do tipo POST
            if($_SERVER["REQUEST_METHOD"] == "POST"){

                // Envia os dados recuperados via POST para os seus respectivos atributos
                $this->usuario->setID($id); // Define que o atributo ID da classe USUARIO seja igual ao argumento do metodo edicao
                $this->$usuario->setNome($_POST["nome"]);
                $this->usuario->setCPF($_POST["cpf"]);
                $this->usuario->setEmail($_POST["email"]);
                $this->usuario->setSenha($_POST["senha"]);
                $this->usuario->setPerfil($_POST["perfil"]);
                $this->usuario->setTelefone($_POST["telefone"]);

                // Chama o metodo ATUALIZAR para armazenar os dados no banco de dados
                $usuario->atualizar();

                // Retorna para a lista de questões
                header("Location: ../public/index.php");
            }else {
                $usuario = $this->usuario->buscaUsuarioID();
                include "../views/usuario/editar.php";
            }
        }

        // Exclui um registro
        public function apagar($id){
            // Verifica se o metodo de requisição é do tipo POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $usuario = new Usuario(); // Cria a instancia da classe USUARIO
            $usuario->setID = $id; // Define que o atributo ID da classe USUARIO seja igual ao argumento do metodo apagar
            $usuario->deletar(); // Chama o metodo DELETAR para apagar o usuario do banco

            // Retorna a pagina principal
            header("Location: ../public/index.php");
            } else {
                $usuario = $this->usuario->buscaUsuarioID();
                include "../views/usuario/deletar.php";
            }

        
        }

    }