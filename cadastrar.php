<?php

require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Qual a sua pergunta?');
define('BUTTON', 'Perguntar');

use \App\Entity\Pergunta;
use \App\Session\Login;

// OBRIGA O USUÁRIO A ESTAR LOGADO
Login::requireLogin();

// INSTÂNCIA DA PERGUNTA
$obPergunta = new Pergunta;

// Verifica se as informações de `cadastrar.php` foram recebidas com sucesso
if (isset($_POST['titulo'], $_POST['conteudo'])) {
    // Instância a Pergunta
    $obPergunta->titulo   = $_POST['titulo'];
    $obPergunta->conteudo = $_POST['conteudo'];
    $obPergunta->cadastrar();

    // RETORNA PARA O INDEX
    header('location: index.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';
