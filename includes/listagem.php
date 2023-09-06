
<!-- Responsável por realizar a listagem das perguntas na página -->
<?php

$mensagem = '';
if (isset($_GET['status'])){
    switch($_GET['status']){
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

?>

<main>

    <?=$mensagem?>

    <section class="nav justify-content-end">

<main class="nav justify-content-end">
    <section>

        <a href="cadastrar.php">
            <button class="btn btn-info">Nova pergunta</button>
        </a>
    </section>

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

</main>