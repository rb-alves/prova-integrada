<?php

    // Cria a conexão com o banco de dados
    class Conexao {
        // Define os atributos necessarios para ultlização do banco
        // O atributo com será responsável por armazenar a conexão quando houver
        private $host = "127.0.0.1";
        private $port = "3307";
        private $user = "root";
        private $password = "mdf@123!";
        private $dbname = "avaliacao_integrada";
        private $conn;

        // Esse metodo tenta realizar a conexão com o banco caso não consiga um erro será exibido
        public function getConexao() {
            // Inicialmente o atributo CONN será NULL caso a conexão seja realizada seu valor mudará
            $this->conn = null;

            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->dbname, $this->user, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                $erro = $e->getMessage();
                echo "Erro de conexão com o banco de dados: " . $erro;

            }
            return $this->conn; // Retorna a conexão ou null caso haja erros
        }
    }