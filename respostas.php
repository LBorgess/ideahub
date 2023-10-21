<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Pergunta;
use \App\DB\Pagination;
use \App\Session\Login;

// OBRIGA O USUÁRIO A ESTAR LOGADO
Login::requireLogin();

include __DIR__ . '/includes/head-links.php';
include __DIR__ . '/includes/header.php';

?>
<main>
<div>
    pergunta daora - mesmo card que no index
</div>

<hr style="width: 100%;">

<div>
    resposta - mesmo card que no index mas somente texto
</div>

</main>