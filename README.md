# Sistema de Prova Integrada

Este repositório contém o desenvolvimento de um **Sistema de Provas Integradas**, realizado como parte do projeto da disciplina **Laboratório de Inovação III** da **Faculdade Senac DF**.

## 📋 Funcionalidades Implementadas
- **CRUD de Questões**: Gerenciamento de questões de prova, incluindo a criação, edição, exclusão e listagem de questões.
- **CRUD de Usuários**: Cadastro, edição, exclusão e listagem de usuários do sistema.
- **Conexão com Banco de Dados**: Integração com MySQL usando PDO para a persistência de dados.
  
## 🚀 Tecnologias Utilizadas
- **PHP**: Linguagem principal usada para o back-end.
- **MySQL**: Banco de dados relacional para armazenar as informações.
- **HTML/CSS/JS**: Criação das interfaces de usuário (views).
- **XAMPP**: Ambiente de desenvolvimento para rodar o servidor local e o banco de dados.
- **PDO**: Biblioteca PHP para interação segura com o banco de dados MySQL.

## 📦 Estrutura do Projeto
- **config/Conexao.php**: Arquivo de configuração para a conexão com o banco de dados.
- **controllers/**: Lógica de negócio.
- **models/**: Definição dos modelos para interagir com o banco de dados.
- **views/**: Páginas de interface com o usuário para realizar operações de criação, edição, exclusão e listagem.
- **public/**: Contém os arquivos públicos da aplicação, como a página inicial (`index.php`), cabeçalhos e rodapés.

## 📖 Metodologia
Este projeto foi desenvolvido com base nos princípios de **MVC (Model-View-Controller)**, garantindo uma separação clara entre a lógica de negócio, a interface de usuário e o banco de dados. Além disso, práticas de **boas práticas de codificação em PHP** foram aplicadas, como:
- Uso de **PDO** para evitar SQL Injection.
- Estrutura de pastas organizada para fácil manutenção.
  
## 🔧 Instruções de Acesso

### 1. Pré-requisitos:
- Tenha o **XAMPP** ou outro servidor local configurado para rodar PHP e MySQL.
- Clone este repositório no seu ambiente local.

### 2. Instalação:
1. Inicie o **XAMPP** e certifique-se de que o Apache e MySQL estão rodando.
2. Importe o arquivo `provaIntegrada.sql` no seu banco de dados MySQL:
   - Use o **workbench** ou qualquer outro cliente MySQL para importar o dump do banco.
3. Abra o arquivo `config/Conexao.php` e verifique as credenciais de conexão com o banco de dados (usuário padrão é `root` e sem senha).
   
### 3. Acessando o Sistema:
1. Navegue até a pasta `public/` do projeto no seu navegador.
2. Acesse a URL `http://localhost/public` para iniciar a aplicação.

## 🗒️ Observações
- O projeto ainda está em desenvolvimento. Até o momento, o **CRUD de Questões** e algumas funcionalidades relacionadas a **Usuários** foram implementadas.
- Futuras melhorias incluirão o restante do sistema e a integração de novas funcionalidades.
