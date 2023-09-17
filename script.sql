/* CRIAÇÃO DO BANCO DE DADOS */

DROP DATABASE IF EXISTS ideahub;

CREATE DATABASE IF NOT EXISTS ideahub;

USE ideahub;

/* CRIAÇÃO DA TABELAS */

CREATE TABLE usuarios(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE perguntas(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    -- usuarios_id INT NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    conteudo TEXT NOT NULL,
    data TIMESTAMP NOT NULL

    -- FOREIGN KEY(usuarios_id) REFERENCES usuarios(id)
);

CREATE TABLE respostas(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    perguntas_id INT NOT NULL,
    usuarios_id INT NOT NULL,
    conteudo TEXT NOT NULL,
    data TIMESTAMP NOT NULL,

    FOREIGN KEY (perguntas_id) REFERENCES perguntas(id)
    -- FOREIGN KEY (usuarios_id) REFERENCES usuarios(id)
);

/* DADOS PARA TESTES E VISUALIZAÇÃO */

INSERT INTO `perguntas` (`id`, `titulo`, `conteudo`, `data`) 
VALUES
	(NULL, 'Dúvida', 'Como centralizar uma div com CSS', '2022-12-14 00:25:59'),
	(NULL, 'Ajuda', 'Como posso estudar PHP?', '2023-09-09 12:25:51'),
	(NULL, 'Python', 'É uma boa escolha querer começar a programar usando a linguagem Python?', '2023-10-10 11:26:09'),
	(NULL, 'Livros', 'Quais livros de progração utilizar?', '2023-01-10 10:00:26'),
    (NULL, 'Jogos', 'Gostaria de criar um jogo, por onde começar?', '2023-02-28 12:00:19'),
    (NULL, 'Ajuda', 'Gostaria de criar um jogo, por onde começar?', '2023-02-28 12:00:19'),
    (NULL, 'C++', 'Como entender ponteiros na linguagem C++?', '2023-12-30 11:00:00'),
    (NULL, 'Jogos', 'Bora jogar um CS?', '2023-01-10 10:00:00'),
    (NULL, 'Livros', 'Livros sobre orientação à objetos, quais usar?', '2023-02-28 12:00:19'),
    (NULL, 'C++', 'Ainda é uma boa estudar C++?', '2023-03-01 12:00:19'),
    (NULL, 'Python', 'Pq não começar com Python?', '2023-02-28 12:00:19'),
    (NULL, 'Emprego', 'Emprego, como conseguir o primeiro emprego na programação?', '2023-05-01 12:00:00'),
    (NULL, 'Emprego', 'Ahhh, estou com dificuldade de arrumar um emprego na área, me ajudemm', '2023-06-01 12:00:00'),
    (NULL, 'Emprego', 'Como entrar na área?', '2023-01-01 12:00:00'),
    (NULL, 'Ajuda', 'Como fazer arroz doce?', '2023-02-15 12:00:29'),
    (NULL, 'Ajudar', 'Posso colocar óleo para fritar na airfryer?', '2023-02-28 15:00:19'),
    (NULL, 'Comida', 'Café pode ser feito dentro de uma airfryer?', '2023-02-28 11:00:19'),
    (NULL, 'Comida', 'Nutrição ou programação, o que fazer?', '2023-02-28 15:00:19'),
    (NULL, 'Redes', 'O que é LAN e WAN?', '2023-02-28 16:00:19'),
    (NULL, 'Redes', 'Qual a melhor operadora de internet?', '2023-02-28 17:00:19'),
    (NULL, 'Emprego', 'Posso trabalhar na IBM?', '2023-02-28 15:00:19'),
    (NULL, 'Sei lá', 'Não sei o que dizer', '2023-02-28 17:00:39');


/* DROP DAS TABELAS */

-- DROP TABLE IF EXISTS respostas, perguntas, usuarios;