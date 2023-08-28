/* CRIAÇÃO DO BANCO DE DADOS */

DROP DATABASE IF EXISTS ideahub;

CREATE DATABASE ideahub;

USE ideahub;

/* CRIAÇÃO DA TABELAS */

CREATE TABLE usuarios(
    usuarios_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    usuarios_data TIMESTAMP NULL,
    atualizado DATETIME NULL
);

CREATE TABLE perguntas(
    perguntas_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    usuarios_id INT NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    perguntas_conteudo TEXT NOT NULL,
    perguntas_data TIMESTAMP NOT NULL,

    FOREIGN KEY(usuarios_id) REFERENCES usuarios(usuarios_id)
);

CREATE TABLE respostas(
    respostas_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    perguntas_id INT NOT NULL,
    usuarios_id INT NOT NULL,
    respostas_conteudo TEXT NOT NULL,
    respostas_data TIMESTAMP NOT NULL,

    FOREIGN KEY (perguntas_id) REFERENCES perguntas(perguntas_id),
    FOREIGN KEY (usuarios_id) REFERENCES usuarios(usuarios_id)
);

/* DROP DAS TABELAS */

-- DROP TABLE IF EXISTS respostas, perguntas, usuarios;