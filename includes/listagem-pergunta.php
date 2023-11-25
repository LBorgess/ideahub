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
    $resultados .= '<tr class="pergunta bg-light rounded">                                               
                        <td class="tentando-mais">
                            <a class="tentando-link" href="resposta.php?id=' . $pergunta->id . '">
                                '.$pergunta->titulo.' 
                            </a>                                                   
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

    <section class="nav justify-content-end">
        <a href="cadastrar.php">
            <button class="btn btn-info mt-2">Nova pergunta</button>
        </a>
    </section>

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