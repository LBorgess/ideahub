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
    $resultados .= ' <article class="card">' .
                        
                        // onde fica o usuario e a data
                        '<header class="cardHeader">
                            <div class="caixa-usuario">
                                <span class="txtUsuario">' . $usuarioLogado['nome'] . '</span>
                            </div>

                            <span class="date">' . date('d/m/Y à\s H:i:s', strtotime($pergunta->data))  .'</span>
                        </header>

                        <h2 class="cardTitulo" maxlength="10">' . $pergunta->titulo .  '
                        <p class="cardText">' . $pergunta->conteudo . '</p>
                        <footer class="cardFotter">
                            <a class="text-light" href="editar.php?id=' . $pergunta->id . '">
                                <button type="button" class="btn-primary px-2 mx-3">Editar</button">
                            <a/>
                            <a class="text-light" href="excluir.php?id=' . $pergunta->id . '">
                                <button type="button" class="btn-danger px-2 mx-3">Excluir</button">
                            <a/>
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
    <!-- <section>
        <form method="get">

            <div class="row my-4">

                <div class="col">
                    <label for="busca">Pesquisar pergunta</label>
                    <input type="text" name="busca" id="busca" class="form-control" value="<?= $busca ?>">
                </div> -->

                <!-- Filtros de perguntas já respondidas -->
                <!-- 
                <div class="col">
                    <label for="status">Respondida</label>
                    <select name="filtroStatus" id="status" class="form-control">
                        <option value="">Sim/Não</option>
                        <option value="s" <?= $filtroStatus == 's' ? 'selected' : '' ?>>Sim</option>
                        <option value="n" <?= $filtroStatus == 'n' ? 'selected' : '' ?>>Não</option>
                    </select>
                </div>
 -->
                <!-- <div class="col d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">Pesquisar</button>
                </div>
            </div>

        </form>
    </section> -->

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