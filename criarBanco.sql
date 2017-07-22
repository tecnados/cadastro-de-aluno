CREATE DATABASE cfcsystem;

CREATE TABLE aluno
(
   id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
   nome VARCHAR(100) NOT NULL,
   cpf VARCHAR(20) UNIQUE,
   idade INT NOT NULL,
   PRIMARY KEY (id)
)
ENGINE = InnoDB;