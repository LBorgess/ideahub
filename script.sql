/* CRIAÇÃO DO BANCO DE DADOS */

DROP DATABASE IF EXISTS ideahub;

CREATE DATABASE ideahub;

USE ideahub;

/* CRIAÇÃO DO USUÁRIO */

CREATE USER 'adm'@'localhost' IDENTIFIED BY 'tcc.ideahub@etec.com';
GRANT ALL ON * . * TO 'adm'@'localhost';
FLUSH PRIVILEGES;

/* CRIAÇÃO DA TABELAS */

CREATE TABLE usuarios(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE perguntas(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    usuarios_id INT NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    conteudo TEXT NOT NULL,
    data TIMESTAMP NOT NULL,
    
    FOREIGN KEY(usuarios_id) REFERENCES usuarios(id)
);

CREATE TABLE respostas(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    perguntas_id INT NOT NULL,
    usuarios_id INT NOT NULL,
    conteudo TEXT NOT NULL,
    data TIMESTAMP NOT NULL,

    FOREIGN KEY (perguntas_id) REFERENCES perguntas(id),
    FOREIGN KEY (usuarios_id) REFERENCES usuarios(id)
);

/* DROP DAS TABELAS */

-- DROP TABLE IF EXISTS respostas, perguntas, usuarios;