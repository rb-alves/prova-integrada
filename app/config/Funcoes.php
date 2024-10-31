<?php

    class Funcoes {


        public function gerarSenha($nome, $cpf){

            // Verifica se os parâmetros não estão vazios
            if (empty($nome) || empty($cpf)) {
                throw new InvalidArgumentException("Nome e CPF não podem estar vazios.");
            }

            // Separa o nome por espaços pegando apenas o primeiro nome
            $nome = explode(" ", $nome);

            // Capitaliza o nome
            $nome = ucfirst($nome[0]);

            return $nome . $cpf . $this->gerarCaractereEspecialAleatorio();

        }

        public function gerarCaractereEspecialAleatorio(){
            // Define um conjunto de caracteres especiais
            $caracteresEspeciais = "!@#$%^&*()-_=+[]{};:,.<>?/~";

            // Gera um índice aleatório dentro do tamanho do conjunto de caracteres
            $indice = random_int(0, strlen($caracteresEspeciais) - 1);

            // Retorna o caractere especial selecionado
            return $caracteresEspeciais[$indice];
        }
            
            
    }