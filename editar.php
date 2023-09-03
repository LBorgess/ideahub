<?php

require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Editar pergunta');
define('BUTTON', 'Editar');

use \App\Entity\Pergunta;

// VALIDAÇÃO DO ID DA PERGUNTA
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

// CONSULTA A PERGUNTA
$obPergunta = Pergunta::getPergunta($_GET['id']);

// VALIDA SE A PERGUNTA EXISTE
if (!$obPergunta instanceof Pergunta) {
    header('location: index.php?status=error');
    exit;
}

// Verifica se as informações de `cadastrar.php` foram recebidas com sucesso
if (isset($_POST['titulo'], $_POST['conteudo'])) {
    // Instância a Pergunta
    $obPergunta->perguntas_titulo   = $_POST['titulo'];
    $obPergunta->perguntas_conteudo = $_POST['conteudo'];
    $obPergunta->atualizar();

    // RETORNA PARA O INDEX
    header('location: index.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';
