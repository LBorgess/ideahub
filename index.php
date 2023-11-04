<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Pergunta;
use \App\DB\Pagination;
use \App\Session\Login;

// OBRIGA O USUÁRIO A ESTAR LOGADO
Login::requireLogin();

// BUSCA
// $busca = filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_STRING);
$busca = filter_input(INPUT_GET, 'busca', FILTER_UNSAFE_RAW);

// FILTRO STATUS DA PERGUNTA RESPONDIDA
// $filtroStatus = filter_input(INPUT_GET, 'filtroStatus', FILTER_UNSAFE_RAW);
// $filtroStatus = in_array($filtroStatus, ['s','n']) ? $filtroStatus : '';

// CONDIÇÕES SQL WHERE PARA BUSCAR A PERGUNTA
$condicoes = [
    // strlen($filtroStatus ?? '') ? 'perguntas_status = "'.$filtroStatus.'"' : null,
    strlen($busca ?? '') ? 'titulo LIKE "%'.str_replace(' ', '%', $busca).'%"' : null
];

// REMOVE ESPAÇOS NULOS OU VAZIAS NA PESQUISA/FILTRO
// $condicoes = array_filter($condicoes);

// CLAUSULA WHERE
$where = implode(' AND ', $condicoes);

// QUANTIDADE TOTAL DE PERGUNTAS
$quantidadePerguntas = Pergunta::getQuantidadePerguntas($where);

// PAGINAÇÃO
$obPagination = new Pagination($quantidadePerguntas, $_GET['pagina'] ?? 1, 10);

// Obtém a listagem das perguntas
$perguntas = Pergunta::getPerguntas($where, null, $obPagination->getLimit());

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem-pergunta.php';
include __DIR__.'/includes/footer.php';
