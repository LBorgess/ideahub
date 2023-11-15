<!-- Responsável por realizar a listagem das perguntas na página -->
<?php

$mensagem = '';
if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'success':
            $mensagem = '<div class="alert alert-success">Ação executada com sucesso</div>';
            break;
        case 'error':
            $mensagem = '<div class="alert alert-danger">Ação não executada</div>';
            break;
    }
}

$resultados = '';
foreach ($perguntas as $pergunta) {
    $resultados .= '<article class="card">' .
                        
                        // onde fica o usuario e a data
                        '<header class="cardHeader">
                            <div class="caixa-usuario">
                                <span class="txtUsuario">' . $usuarioLogado['nome'] . '</span>
                            </div>

                            <span class="date">' . date('d/m/Y', strtotime($pergunta->data))  .'</span>
                        </header>

                        <h2 class="cardTitulo" maxlength="10">' . $pergunta->titulo .  ' </h2>
                        <p class="cardText">' . $pergunta->conteudo . '</p>
                        
                        <footer class="cardFooter">
                            <a href="#"><i class="bi bi-chat-left-text-fill"></i></a>
                            <i class="bi bi-hand-thumbs-up-fill"></i>
                            <!-- <a href="editar.php?id=' . $pergunta->id . '" class="btn btn-outline-primary p-2 mx-3">editar</a>
                            <a href="excluir.php?id=' . $pergunta->id . '" class="btn btn-outline-danger p-2 mx-3">excluir</a> -->
                        </footer>
                    </article>';
}

$resultados = strlen($resultados) ? $resultados : '<tr><td colspan=4 class="text-center">Nenhuma pergunta realizada</td></tr>';

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

    <!-- Campo de busca -->
        <form method="get" class="formPesquisa">

            <div class="text-center">

                <div class="col">
                    <label for="busca">Pesquisar pergunta</label>
                    <input type="text" name="busca" id="busca" class="form-control" value="<?= $busca ?>">
                </div>

                <!-- Filtros de perguntas já respondidas -->
                <div class="col">
                    <label for="status">Respondida</label>
                    <select name="filtroStatus" id="status" class="form-control">
                        <option value="">Sim/Não</option>
                        <option value="s" <?= $filtroStatus == 's' ? 'selected' : '' ?>>Sim</option>
                        <option value="n" <?= $filtroStatus == 'n' ? 'selected' : '' ?>>Não</option>
                    </select>
                </div>
                <div class="col d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">Pesquisar</button>
                </div>
            </div>
        </form>

    <!-- Listagem das perguntas -->
    <section>
        <table class="table bg-light mt-3">
      
            <tbody>
                <?= $resultados ?>
            </tbody>

        </table>
    </section>

    <!-- Paginaçao -->
    <section>
        <?= $paginacao ?>
    </section>

</main>