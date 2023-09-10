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
    $resultados .= '<tr>
                        <td>' . $pergunta->perguntas_titulo . '</td>
                        <td>' . $pergunta->perguntas_conteudo . '</td>
                        <td>' . date('d/m/Y à\s H:i:s', strtotime($pergunta->perguntas_data)) . '</td>
                        <td>
                            <a class="text-light" href="editar.php?id=' . $pergunta->perguntas_id . '">
                                <button type="button" class="btn btn-primary">Editar</button">
                            <a/>
                            <a class="text-light" href="excluir.php?id=' . $pergunta->perguntas_id . '">
                                <button type="button" class="btn btn-danger">Excluir</button">
                            <a/>
                        </td>
                    </tr>';
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

    <section class="nav justify-content-end">
        <a href="cadastrar.php">
            <button class="btn btn-info">Nova pergunta</button>
        </a>
    </section>

    <!-- Campo de busca -->
    <section>
        <form method="get">

            <div class="row my-4">

                <div class="col">
                    <label for="busca">Pesquisar pergunta</label>
                    <input type="text" name="busca" id="busca" class="form-control" value="<?= $busca ?>">
                </div>

                <!-- Filtros de perguntas já respondidas-->
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
                <div class="col d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">Pesquisar</button>
                </div>
            </div>

        </form>
    </section>

    <!-- Listagem das perguntas -->
    <section>
        <table class="table bg-light mt-3">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Conteúdo</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
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