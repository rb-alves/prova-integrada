<?php

    // Chama o arquivo de conexão para o atual
    require_once "../config/Conexao.php";

     // Cria a classe QUESTAO para realizar as 4 operações de CRUD no banco de dados
    class Questao {
        //Declara os atributos da classe
        private $id, $enunciado, $opcao_a, $opcao_b, $opcao_c, $opcao_d, $opcao_e, $resposta, $nivel, $disciplina, $usuario, $data_criacao;
        private $nomeTabela = "questoes";
        private $conn;


        // Envia um valor para o atributo ID
        public function setID($id){
            $this->id = $id;
        }
        // Resgata o valor armazenado no atributo ID
        public function getID(){
            return $this->id;
        }


        // Envia um valor para o atributo ENUNCIADO
        public function setEnunciado($enunciado){
            $this->enunciado = $enunciado;
        }
        // Resgata o valor armazenado no atributo ENUNCIADO
        public function getEnunciado(){
            return $this->enunciado;
        }


        // Envia um valor para o atributo OPCAO_A
        public function setOpcaoA($opcao_a){
            $this->opcao_a = $opcao_a;
        }
        // Resgata o valor armazenado no atributo OPCAO_A
        public function getOpcaoA(){
            return $this->opcao_a;
        }


        // Envia um valor para o atributo OPCAO_B
        public function setOpcaoB($opcao_b){
            $this->opcao_b = $opcao_b;
        }
        // Resgata o valor armazenado no atributo OPCAO_B
        public function getOpcaoB(){
            return $this->opcao_b;
        }


        // Envia um valor para o atributo OPCAO_C
        public function setOpcaoC($opcao_c){
            $this->opcao_c = $opcao_c;
        }
        // Resgata o valor armazenado no atributo OPCAO_C
        public function getOpcaoC(){
            return $this->opcao_c;
        }


        // Envia um valor para o atributo OPCAO_D
        public function setOpcaoD($opcao_d){
            $this->opcao_d = $opcao_d;
        }
        // Resgata o valor armazenado no atributo OPCAO_D
        public function getOpcaoD(){
            return $this->opcao_d;
        }


        // Envia um valor para o atributo OPCAO_E
        public function setOpcaoE($opcao_e){
            $this->opcao_e = $opcao_e;
        }
        // Resgata o valor armazenado no atributo OPCAO_E
        public function getOpcaoE(){
            return $this->opcao_e;
        }


        // Envia um valor para o atributo RESPOSTA
        public function setResposta($resposta){
            $this->resposta = $resposta;
        }
        // Resgata o valor armazenado no atributo RESPOSTA
        public function getResposta(){
            return $this->resposta;
        }


        // Envia um valor para o atributo NIVEL
        public function setNivel($nivel){
            $this->nivel = $nivel;
        }
        // Resgata o valor armazenado no atributo NIVEL
        public function getNivel(){
            return $this->nivel;
        }

        // Envia um valor para o atributo DISCIPLINCA
        public function setDisciplina($disciplina){
            $this->disciplina = $disciplina;
        }
        // Resgata o valor armazenado no atributo DISCIPLINA
        public function getDisciplina(){
            return $this->disciplina;
        }

        // Envia um valor para o atributo USUARIO
        public function setUsuario($usuario){
            $this->usuario = $usuario;
        }
        // Resgata o valor armazenado no atributo USUARIO
        public function getUsuario(){
            return $this->usuario;
        }


        // Envia um valor para o atributo DATA_CRIACAO
        public function setData($data){
            $this->data_criacao = $data;
        }
        // Resgata o valor armazenado no atributo DATA_CRIACAO
        public function getData(){
            return $this->data_criacao;
        }


        // Cria um construtor para que toda vez que a classe QUESTÃO seja instaciada uma conexão seja gerada
        public function __construct(){
            $conexao = new Conexao();
            $this->conn = $conexao->getConexao();
        }



        // Cadastra uma nova questão no banco de dados
        public function cadastrar(){
            try{
                // Define a query
                $query = "INSERT INTO $this->nomeTabela
                        (enunciado, opcao_a, opcao_b, opcao_c, opcao_d, opcao_e, resposta, nivel_dificuldade, disciplina_id, usuario_id, data_criacao)
                        VALUES
                        (:enunciado, :opcao_a, :opcao_b, :opcao_c, :opcao_d, :opcao_e, :resposta, :nivel, :disciplina, :usuario, :data_criacao);";
                
                // Prepara a query para ser executada;
                $stmt = $this->conn->prepare($query);

                // Define as variaveis na query
                $stmt->bindParam(":enunciado", $this->enunciado);
                $stmt->bindParam(":opcao_a", $this->opcao_a);
                $stmt->bindParam(":opcao_b", $this->opcao_b);
                $stmt->bindParam(":opcao_c", $this->opcao_c);
                $stmt->bindParam(":opcao_d", $this->opcao_d);
                $stmt->bindParam(":opcao_e", $this->opcao_e);
                $stmt->bindParam(":resposta", $this->resposta);
                $stmt->bindParam(":nivel", $this->nivel);
                $stmt->bindParam(":disciplina", $this->disciplina);
                $stmt->bindParam(":usuario", $this->usuario);
                $stmt->bindParam(":data_criacao", $this->data_criacao);

                // Executa a query
                $stmt->execute();            
            } catch (PDOExpection $e) {
                $erro = $e->getMessage();
                echo "Erro ao cadastrar a questão: " . $erro;
            }
        }


        // Exibe todas as questões cadastradas na tabela
        public function exibir(){
            try {
                // Define a query
                $query = "SELECT * FROM $this->nomeTabela;";

                // Prepara a query para ser executada;
                $stmt = $this->conn->prepare($query);

                // Executa a query
                $stmt->execute();
                
                // Transform o objeto retornado da query em um Array
                $Allregistros = $stmt->fetchAll();

                // Retorna o Array
                return $Allregistros;

            } catch (PDOExpection $th) {
                $erro = $e->getMessage();
                echo "Erro ao exibir questões: " . $erro;
            }
        }

        // Exibe uma questão buscada por ID especifico
        public function buscaQuestaoId($id){
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
                echo "Erro ao buscar a questão: " . $erro;
            }
        }


        // Edita uma questão cadastrada na Tabela
        public function atualizar(){
            try{
                // Define a query
                $query = "UPDATE $this->nomeTabela SET
                        enunciado = :enunciado, opcao_a = :opcao_a, opcao_b = :opcao_b, opcao_c = :opcao_c, opcao_d = :opcao_d, opcao_e = :opcao_e,
                        resposta = :resposta, nivel_dificuldade = :nivel, disciplina_id = :disciplina, usuario_id = :usuario, data_criacao = :data_criacao
                        WHERE id = :id;";
                
                // Prepara a query para ser executada
                $stmt = $this->conn->prepare($query);

                // Define as variaveis na query
                $stmt->bindParam(":enunciado", $this->enunciado);
                $stmt->bindParam(":opcao_a", $this->opcao_a);
                $stmt->bindParam(":opcao_b", $this->opcao_b);
                $stmt->bindParam(":opcao_c", $this->opcao_c);
                $stmt->bindParam(":opcao_d", $this->opcao_d);
                $stmt->bindParam(":opcao_e", $this->opcao_e);
                $stmt->bindParam(":resposta", $this->resposta);
                $stmt->bindParam(":nivel", $this->nivel);
                $stmt->bindParam(":disciplina", $this->disciplina);
                $stmt->bindParam(":usuario", $this->usuario);
                $stmt->bindParam(":data_criacao", $this->data_criacao);
                $stmt->bindParam(":id", $this->id);

                // Executa a query
                $stmt->execute();
            } catch (PDOExpection $e){
                $erro = $e->getMessage();
                echo "Erro ao editar a questão: " . $erro;
            }
        }


        // Realiza a exclusão de uma questão da tabela
        public function deletar(){
            try{
                // Define a query
                $query = "DELETE FROM $this->nomeTabela
                WHERE id = :id";

                // Prepara a query para ser executa
                $stmt = $this->conn->prepare($query);

                // Define as variaveis na query
                $stmt->bindParam(":id", $this->id);

                // Executa a query
                return $stmt->execute();
            } catch (PDOExpection $e){
                $erro = $e->getMessage();
                echo "Erro ao excluir a questão: " . $erro;
            }
        }       
    }