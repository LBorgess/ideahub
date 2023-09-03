<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Pergunta;

// Obtém a listagem das perguntas
$perguntas = Pergunta::getPergunta();

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';
