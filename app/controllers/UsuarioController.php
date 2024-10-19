<?php

    require_once "../models/Usuario.php";

    class UsuarioController {
        
        // Lista todos os usuarios da tabela
        public function listaUsuarios(){
            $usuario = new Usuario(); // Cria a instancia da classe USUARIO
            $usuarios = $usuario->exibir(); // Chama o metodo EXIBIR
            include "../views/usuario/listar.php";
        }

        // Cria um novo usuario
        public function cadastro(){
            // Verifica se o metodo de requisição é do tipo POST
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $usuario = new Usuario(); // Cria a instancia da classe USUARIO
                
                // Envia os dados recuperados via POST para os seus respectivos atributos
                $usuario->setNome($_POST["nome"]); 
                $usuario->setCPF($_POST["cpf"]);
                $usuario->setEmail($_POST["email"]);
                $usuario->setPerfil($_POST["perfil"]);

                // Chama o metodo CADASTRAR para armazenar os dados no banco de dados
                $usuario->cadastrar();

                // Retorna a pagina principal
                header("Location: ../public/index.php?action=list");
            }
        }

        // Atualiza um registro 
        public function edicao($id){

            $usuario = new Usuario(); // Cria a instancia da classe USUARIO

            // Verifica se o metodo de requisição é do tipo POST
            if($_SERVER["REQUEST_METHOD"] == "POST"){

                // Envia os dados recuperados via POST para os seus respectivos atributos
                $usuario->setID($id); // Define que o atributo ID da classe USUARIO seja igual ao argumento do metodo edicao
                $usuario->setNome($_POST["nome"]);
                $usuario->setCPF($_POST["cpf"]);
                $usuario->setEmail($_POST["email"]);
                $usuario->setSenha($_POST["senha"]);
                $usuario->perfil($_POST["perfil"]);

                // Chama o metodo ATUALIZAR para armazenar os dados no banco de dados
                $usuario->atualizar();

                // Retorna a pagina principal
                header("Location: ../views/usuario/index.php");
            }
        }

        // Exclui um registro
        public function apagar($id){
            $usuario = new Usuario(); // Cria a instancia da classe USUARIO
            $usuario->setID = $id; // Define que o atributo ID da classe USUARIO seja igual ao argumento do metodo apagar
            $usuario->deletar();

            // Retorna a pagina principal
            header("Location: ../views/usuario/index.php");
        }

    }