<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Pergunta;

// BUSCA/FILTRO
// $busca = filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_STRING);
$busca = filter_input(INPUT_GET, 'busca', FILTER_UNSAFE_RAW);

// CONDIÇÕES SQL WHERE PARA BUSCAR A PERGUNTA
$condicoes = [
    strlen($busca ?? '') ? 'perguntas_titulo LIKE "%'.str_replace(' ', '%', $busca).'%"' : null
];

// CLAUSULA WHERE
$where = implode(' AND ', $condicoes);

// Obtém a listagem das perguntas
$perguntas = Pergunta::getPerguntas($where);

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';
