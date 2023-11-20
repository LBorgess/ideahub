<?php

require __DIR__ . '/vendor/autoload.php';

define('BUTTON', 'Responder');

use \App\Entity\Pergunta;
use \App\Session\Login;
use \App\Entity\Resposta;

// OBTÉM NOME DO USUÁRIO QUE VEZ A PERGUNTA
$username = Login::getUsuarioLogado();

// OBRIGA O USUÁRIO A ESTAR LOGADO
Login::requireLogin();

// INSTÂNCIA DA RESPOSTA
$obResposta = new Resposta;

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

// TRATAMENTO DA RESPOSTA
if (isset($_POST['conteudo'])) {
    $obResposta->conteudo = $_POST['conteudo'];
    $obResposta->cadastrar();

    // RETORNA PARA O INDEX
    header('location: index.php?status=success');
    exit;
}

$where = 'perguntas_id = ' . $_GET['id'];

$respostas = Resposta::getRespostas($where);

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario-resposta.php';
include __DIR__ . '/includes/footer.php';
