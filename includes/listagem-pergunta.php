<!-- Responsável por realizar a listagem das perguntas na página -->
<?php

$mensagem = '';
if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'success':
            $mensagem = '<div class="alert alert-success mt-2">Ação executada com sucesso</div>';
            break;
        case 'error':
            $mensagem = '<div class="alert alert-danger mt-2">Ação não executada</div>';
            break;
    }
}

$resultados = '';
foreach ($perguntas as $pergunta) {
    $resultados .= '<tr class="pergunta  bg-light rounded">                                               
                        <td class="tentando-mais">
                        <a class="tentando-link" href="resposta.php?id=' . $pergunta->id . '">
                        <span class="titulo-pergunta">'.$pergunta->titulo.'</span> 
                        </a>                                     
                        <div class="f-card">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
                                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                                </svg>
    
                                <small>'. $pergunta->data .'</small>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-right" viewBox="0 0 16 16">
                                <path d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z"/>
                            </svg>
                        </div>              
                        </td>
                    </tr>';
}

$resultados = strlen($resultados) ? $resultados : '<tr class="nao-tem-coment"><td colspan=4 class="text-center text-light">Nenhuma pergunta realizada</td></tr>';

// PAGINAÇÃO

// GETS
unset($_GET['status']);
unset($_GET['pagina']);
$gets = http_build_query($_GET);

$paginacao = '';
$paginas = $obPagination->getPages();

foreach ($paginas as $key => $pagina) {
    $class = $pagina['atual'] ? 'btn-primary' : 'btn-light';
    $paginacao .= '<a href="?pagina=' . $pagina['pagina'] . '&' . $gets . '">
                        <button type="button" class="btn ' . $class . '">' . $pagina['pagina'] . '</button>
                    </a>';
}

?>

<main>

    <?= $mensagem ?>

    <!-- Listagem das perguntas -->
    <section>
        <table class="table">
            <!-- <thead>
                <tr>
                    <th></th>
                </tr>
            </thead> -->
            <tbody class="tentando-muito my-4">
                <?= $resultados ?>                
            </tbody>

        </table>
    </section>

    <!-- Paginaçao -->
    <section>
        <?= $paginacao ?>
    </section>

</main>