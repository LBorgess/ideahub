<!-- Responsável por realizar a listagem das perguntas na página -->
<?php
$resultados = '';
foreach ($perguntas as $pergunta) {
    $resultados .= '<tr>
                        <td>' . $pergunta->perguntas_titulo . '</td>
                        <td>' . $pergunta->perguntas_conteudo . '</td>
                        <td>' . date('d/m/Y à\s H:i:s', strtotime($pergunta->perguntas_data)) . '</td>
                        <td>
                            <a href="editar.php?id=' .$pergunta->perguntas_id .'">
                                <button type="button" class="btn btn-primary">Editar</button">
                            <a/>
                            <a href="excluir.php?id=' .$pergunta->perguntas_id .'">
                                <button type="button" class="btn btn-danger">Excluir</button">
                            <a/>
                        </td>
                    </tr>';
}
?>

<main>
    <section class="nav justify-content-end">
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