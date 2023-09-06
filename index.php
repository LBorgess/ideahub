<?php

require __DIR__.'/vendor/autoload.php';


use \App\Entity\Pergunta;

// Obtém a listagem das perguntas
$perguntas = Pergunta::getPerguntas();

=======

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/card-pergunta.php';
include __DIR__.'/includes/footer.php';
