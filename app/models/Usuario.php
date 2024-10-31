<?php

    // Chama o arquivo de conexão para o atual
    require_once "../config/Conexao.php";

    // Cria a classe USUARIO para realizar as 4 operações de CRUD no banco de dados
    class Usuario {
        // Declara os atributos
        private $id, $nome, $cpf, $email, $senha, $perfil, $telefone;
        private $nomeTabela = "usuarios";
        private $conn;

        // Envia o nome para atributo nome
        public function setNome($nome){
            $this->nome = $nome;
        }
        // Resgata o valor do atributo nome
        public function getNome(){
            return $this->nome;
        }

        // Envia o valor para atributo cpf
        public function setCPF($cpf){
            $this->cpf = $cpf;
        }
        // Resgata o valor do atributo cpf
        public function getCPF(){
            return $this->cpf;
        }

        // Resgata o valor do atributo email
        public function setEmail($email){
            $this->email = $email;
        }
        // Resgata o valor do atributo email
        public function getEmail(){
            return $this->email;
        }

        // Envia o valor para atributo senha
        public function setSenha($senha){
            $this->senha = $senha;
        }
        // Resgata o valor do atributo senha 
        public function getSenha(){
            return $this->senha;
        }

        // Envia o valor para atributo perfil
        public function setPerfil($perfil){
            $this->perfil = $perfil;
        }
        // Resgata o valor do atributo perfil
        public function getPerfil(){
            return $this->perfil;
        }

        // Envia o valor para atributo id
        public function setID($id){
            $this->id = $id;
        }

        // Resgata o valor do atributo id
        public function getID(){
            return $this->id;
        }

        public function setTelefone($telefone){
            $this->telefone = $telefone;
        }

        public function getTelefone(){
            return $this->telefone;
        }

        // Cria um construtor para que toda vez que a classe USUARIO seja instaciada uma conexão seja gerada
        public function __construct(){
            $conexao = new Conexao();
            $this->conn = $conexao->getConexao();
        }

        // Cria um novo usuário
        public function cadastrar(){
            try {
            // Define a query
            $query = "INSERT INTO " . $this->nomeTabela . 
            "(nome, cpf, email, senha, perfil, telefone)
             VALUES
             (:nome, :cpf, :email, :senha, :perfil, :telefone)
            ";

            // Prepara a query para ser executada
            $stmt = $this->conn->prepare($query);
            
            // Define as variaveis na query
            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(":cpf", $this->cpf);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":senha", password_hash($this->senha, PASSWORD_DEFAULT));
            $stmt->bindParam(":perfil", $this->perfil);
            $stmt->bindParam(":telefone", $this->telefone);

            //Executa a query
            return $stmt->execute();

            } catch (PDOException $e) {
                $erro = $e->getMessage();
                echo "Erro ao cadastrar usuário: " . $erro;
            }
        }

        // Exibe todos os registros da tabela
        public function exibir(){
            try {
                $query = "SELECT * FROM $this->nomeTabela;";
                $stmt = $this->conn->prepare($query);
                $stmt->execute();
                $Allregisros = $stmt->fetchAll();
                return $Allregisros;
            } catch (PDOException $e) {
                $erro = $e->getMessage();
                echo "Erro ao buscar usuários: " . $erro;
            }
        }

        // Exibe um usuario buscado por um ID especifico
        public function buscaUsuarioId($id){
            try {
                // Define a query
                $query = "SELECT * FROM $this->nomeTabela
                WHERE id = :id;";

                // Prepara a query para ser executada;
                $stmt = $this->conn->prepare($query);

                // Define a variavel na query
                $stmt->bindParam(":id", $id);

                // Executa a query
                $stmt->execute();

                // Tranforma o objeto retornado da query em um array com um unico item
                $OnlyQuestao = $stmt->fetch();

                // Retorna um unico registro
                return $OnlyQuestao;
            } catch (PDOException $e) {
                $erro = $e->getMessage();
                echo "Erro ao buscar o usuário: " . $erro;
            }
        }
        
        // Realiza atualização em registro da tabela
        public function atualizar(){
            try {
                // Define a query
                $query = "UPDATE " . $this->nomeTabela .
                " SET nome = :nome, cpf = :cpf, email = :email, senha = :senha, perfil = :perfil, telefone = :telefone
                WHERE id = :id";

                // Prepara a query para ser executada
                $stmt = $this->conn->prepare($query);

                // Define as variaveis na query
                $stmt->bindParam(":nome", $this->nome);
                $stmt->bindParam(":cpf", $this->cpf);
                $stmt->bindParam(":email", $this->email);
                $stmt->bindParam(":senha", password_hash($this->senha, PASSWORD_DEFAULT));
                $stmt->bindParam(":perfil", $this->perfil);
                $stmt->bindParam(":telefone", $this->telefone);

                // Executa a query
                return $stmt->execute();
            } catch (PDOException $e) {
                $erro = $e->getMessage();
                echo "Erro ao editar o usuário: " . $erro;
            }
        }

        // Realiza a exclusão de um registro da tabela
        public function deletar(){
            try {
                // Define a query
                $query = "DELETE FROM " . $this->nomeTabela .
                " WHERE id = :id";

                // Prepara a query para ser executa
                $stmt = $this->conn->prepare($query);

                // Define as variaveis na query
                $stmt->bindParam(":id", $this->id);

                // Executa a query
                return $stmt->execute();
            } catch (PDOException $e) {
                $erro = $e->getMessage();
                echo "Erro ao excluir usuário: " . $erro;
            }
        }
    }