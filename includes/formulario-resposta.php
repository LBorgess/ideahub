<?php

$listrespostas = '';
foreach ($respostas as $resposta) {
    $listrespostas .= '<tr>                       
                        <td>
                        ' . $resposta->conteudo . '
                        </td>
                    </tr>';
}

$listrespostas = strlen($listrespostas) ? $listrespostas : '<tr><td colspan=4 class="text-center">Ainda não há nenhum comentário</td></tr>'

?>
<main>
    <div class="nav justify-content-end">
        <section">
            <a href="index.php">
                <button class="btn btn-info mt-2">Voltar</button>
            </a>
            </section>
    </div>

    <h4 class="mt-3"><?= $obPergunta->titulo ?></h4>
    <small><?= $username['nome'] ?> </small>

    <!-- Formulário de resposta da pergunta -->

    <form method="POST">

        <!-- Conteúdo pergunta -->
        <div class="form-group">
            <textarea class="form-control mt-2" rows="5" readonly><?= $obPergunta->conteudo ?></textarea>
        </div>

        <!-- Campo para responder -->

        <div class="form-group">
            <textarea class="form-control mt-2" name="conteudo" id="conteudo" rows="3"></textarea>
        </div>

        <!-- Botão responder -->
        <div class="form-group">
            <button type="submit" class="btn btn-success mt-2"><?= BUTTON ?></button>
        </div>

        <!-- Lista de resposta para a pergunta -->
        <section class="mt-2">
            <table class="table bg-light mt-2">
                <?= $listrespostas ?>
            </table>
        </section>

    </form>

</main>