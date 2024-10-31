CREATE SCHEMA IF NOT EXISTS `avaliacao_integrada` DEFAULT CHARACTER SET utf8mb4 ;
USE `avaliacao_integrada` ;

CREATE TABLE IF NOT EXISTS `avaliacao_integrada`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `cpf` VARCHAR(14) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  `perfil` ENUM('Administrador', 'Professor', 'Aluno') NOT NULL,
  `telefone` VARCHAR(15) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC),
  UNIQUE INDEX `usuarioscol_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `avaliacao_integrada`.`professores` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_usuario_id` INT NOT NULL,
  `status` ENUM('Ativo', 'Inativo', 'Afastado') NOT NULL DEFAULT 'Ativo',
  `titulacao` ENUM('Especialista', 'Mestre', 'Doutor'),
  PRIMARY KEY (`id`),
  INDEX `usuario_id_idx` (`id_usuario_id` ASC),
  CONSTRAINT `usu_id`
    FOREIGN KEY (`id_usuario_id`)
    REFERENCES `avaliacao_integrada`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `avaliacao_integrada`.`cursos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `avaliacao_integrada`.`cursos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome_curso` VARCHAR(255) NOT NULL,
  `duracao` INT NOT NULL,
  `status` ENUM('Ativo', 'Inativo') NOT NULL DEFAULT 'Ativo',
  `data_criacao` DATE NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `avaliacao_integrada`.`turmas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(255) NOT NULL,
  `status` ENUM('Ativo', 'Inativo') NOT NULL DEFAULT 'Ativo',
  `curso_id` INT NOT NULL,

  PRIMARY KEY (`id`),
  INDEX `cursoid_idx` (`curso_id` ASC),
  CONSTRAINT `cursoid`
    FOREIGN KEY (`curso_id`)
    REFERENCES `avaliacao_integrada`.`cursos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `avaliacao_integrada`.`alunos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `avaliacao_integrada`.`alunos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `usuario_id` INT NOT NULL,
  `matricula` VARCHAR(50) NOT NULL,
  `status` ENUM('Ativo', 'Inativo', 'Trancado', 'Concluído') NOT NULL DEFAULT 'Ativo',
  `curso_id` INT NOT NULL,
  `turma_id` INT NOT NULL,
  PRIMARY KEY (`idalunos`),
  INDEX `usuario_id_idx` (`usuario_id` ASC),
  UNIQUE INDEX `matricula_UNIQUE` (`matricula` ASC),
  INDEX `curso_id_idx` (`curso_id` ASC),
  INDEX `turma_id_idx` (`turma_id` ASC),
  CONSTRAINT `usuario_id`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `avaliacao_integrada`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `curso_id`
    FOREIGN KEY (`curso_id`)
    REFERENCES `avaliacao_integrada`.`cursos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `turma_id`
    FOREIGN KEY (`turma_id`)
    REFERENCES `avaliacao_integrada`.`turmas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `avaliacao_integrada`.`tokens` (
  `id` INT(11) NOT NULL,
  `cpf` VARCHAR(14) NOT NULL,
  `token` VARCHAR(255) NOT NULL,
  `expira_em` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `cpf_fk_idx` (`cpf` ASC),
  CONSTRAINT `cpf_fk`
    FOREIGN KEY (`cpf`)
    REFERENCES `avaliacao_integrada`.`usuarios` (`cpf`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `avaliacao_integrada`.`disciplinas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `carga_horaria` INT NOT NULL,
  `status` ENUM('Ativo', 'Inativo') NOT NULL DEFAULT 'Ativo',
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `avaliacao_integrada`.`disciplinas_cursos` (
  `id_disciplina` INT NOT NULL,
  `id_curso` INT NOT NULL,
  INDEX `disciplina_idx` (`id_disciplina` ASC),
  INDEX `curso_idx` (`id_curso` ASC),
  CONSTRAINT `disciplina`
    FOREIGN KEY (`id_disciplina`)
    REFERENCES `avaliacao_integrada`.`disciplinas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `curso`
    FOREIGN KEY (`id_curso`)
    REFERENCES `avaliacao_integrada`.`cursos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `avaliacao_integrada`.`professores_cursos` (
  `id_professor` INT NOT NULL,
  `id_curso` INT NOT NULL,
  INDEX `professor_idx` (`id_professor` ASC),
  INDEX `curso_idx` (`id_curso` ASC),
  CONSTRAINT `professor`
    FOREIGN KEY (`id_professor`)
    REFERENCES `avaliacao_integrada`.`professores` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `curs`
    FOREIGN KEY (`id_curso`)
    REFERENCES `avaliacao_integrada`.`cursos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `avaliacao_integrada`.`professores_disciplinas` (
  `id_professor` INT NOT NULL,
  `id_disciplina` INT NOT NULL,
  INDEX `professores_idx` (`id_professor` ASC),
  INDEX `disciplinas_idx` (`id_disciplina` ASC),
  CONSTRAINT `professores`
    FOREIGN KEY (`id_professor`)
    REFERENCES `avaliacao_integrada`.`professores` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `disciplinas`
    FOREIGN KEY (`id_disciplina`)
    REFERENCES `avaliacao_integrada`.`disciplinas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `avaliacao_integrada`.`questoes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `enunciado` TEXT NOT NULL,
  `opcao_a` VARCHAR(255) NOT NULL,
  `opcao_b` VARCHAR(255) NOT NULL,
  `opcao_c` VARCHAR(255) NULL,
  `opcao_d` VARCHAR(255) NULL,
  `opcao_e` VARCHAR(255) NULL,
  `resposta` CHAR(1) NOT NULL,
  `nivel_dificuldade` ENUM('Fácil', 'Médio', 'Difícil') NOT NULL,
  `disciplina_id` INT NOT NULL,
  `professor_id` INT NOT NULL,
  `data_hora_criacao` DATETIME NOT NULL,
  `anexo` VARCHAR(255) NULL,
  PRIMARY KEY (`id`),
  INDEX `disciplina_idx` (`disciplina_id` ASC),
  INDEX `professor_idx` (`professor_id` ASC),
  CONSTRAINT `disciplin`
    FOREIGN KEY (`disciplina_id`)
    REFERENCES `avaliacao_integrada`.`disciplinas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `professo`
    FOREIGN KEY (`professor_id`)
    REFERENCES `avaliacao_integrada`.`professores` (`idprofessores`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `avaliacao_integrada`.`provas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `data_hora_inicio` DATETIME NOT NULL,
  `data_hora_fim` DATETIME NOT NULL,
  `turma_id` INT NOT NULL,
  `status` ENUM('Agendada', 'Concluída', 'Cancelada') NOT NULL,
  `tempo_limite` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `turma_idx` (`turma_id` ASC),
  CONSTRAINT `turma`
    FOREIGN KEY (`turma_id`)
    REFERENCES `avaliacao_integrada`.`turmas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `avaliacao_integrada`.`questoes_provas` (
  `id_questao` INT NOT NULL,
  `id_prova` INT NOT NULL,
  INDEX `quest_idx` (`id_questao` ASC),
  INDEX `prov_idx` (`id_prova` ASC),
  CONSTRAINT `quest`
    FOREIGN KEY (`id_questao`)
    REFERENCES `avaliacao_integrada`.`questoes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `prov`
    FOREIGN KEY (`id_prova`)
    REFERENCES `avaliacao_integrada`.`provas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `avaliacao_integrada`.`questoes_respondidas` (
  `aluno_id` INT NOT NULL,
  `prova_id` INT NOT NULL,
  `questao_id` INT NOT NULL,
  `resposta` CHAR(1) NOT NULL,
  INDEX `alu_idx` (`aluno_id` ASC),
  INDEX `pro_idx` (`prova_id` ASC),
  INDEX `ques_idx` (`questao_id` ASC),
  CONSTRAINT `alu`
    FOREIGN KEY (`aluno_id`)
    REFERENCES `avaliacao_integrada`.`alunos` (`idalunos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `pro`
    FOREIGN KEY (`prova_id`)
    REFERENCES `avaliacao_integrada`.`provas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ques`
    FOREIGN KEY (`questao_id`)
    REFERENCES `avaliacao_integrada`.`questoes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


