<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Pergunta;

// Verifica se as informações de `cadastrar.php` foram recebidas com sucesso
if (isset($_POST['titulo'], $_POST['conteudo'])) {
    // Instância a Pergunta
    $obPergunta = new Pergunta;
    $obPergunta->titulo   = $_POST['titulo'];
    $obPergunta->conteudo = $_POST['conteudo'];
    $obPergunta->cadastrar();
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';
