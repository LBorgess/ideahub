<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Pergunta;

// BUSCA
// $busca = filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_STRING);
$busca = filter_input(INPUT_GET, 'busca', FILTER_UNSAFE_RAW);

// FILTRO STATUS DA PERGUNTA RESPONDIDA
// $filtroStatus = filter_input(INPUT_GET, 'status', FILTER_UNSAFE_RAW);
// $filtroStatus = in_array($filtroStatus, ['s','n']) ? $filtroStatus : '';

// CONDIÇÕES SQL WHERE PARA BUSCAR A PERGUNTA
$condicoes = [
    // strlen($filtroStatus ?? '') ? 'perguntas_status = "'.$filtroStatus.'"' : null,
    strlen($busca ?? '') ? 'perguntas_titulo LIKE "%'.str_replace(' ', '%', $busca).'%"' : null
];

// REMOVE ESPAÇOS NULOS OU VAZIAS NA PESQUISA/FILTRO
$condicoes = array_filter($condicoes);

// CLAUSULA WHERE
$where = implode(' AND ', $condicoes);

// Obtém a listagem das perguntas
$perguntas = Pergunta::getPerguntas($where);

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';
