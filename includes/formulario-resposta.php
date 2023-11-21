<?php

$listrespostas = '';
foreach ($respostas as $resposta) {
    $listrespostas .= '<tr class="bg-light rounded">                       
                        <td class="tentando-mais">
                        ' . $resposta->conteudo . '
                        </td>
                    </tr>';
}

$listrespostas = strlen($listrespostas) ? $listrespostas : '<tr class="nao-tem-coment"><td colspan=4 class="text-center text-light">Ainda não há nenhum comentário</td></tr>'

?>
<main>
    <div class="nav justify-content-end">
        <section">
            <a href="index.php">
                <button class="btn btn-info mt-2">Voltar</button>
            </a>
            </section>
    </div>

    <h4 class="mt-3 mb-2"><?= $obPergunta->titulo ?></h4>
    <!-- <small><?= $username ?> </small> -->

    <!-- Formulário de resposta da pergunta -->

    <form method="POST">

        <!-- Conteúdo pergunta -->
        <div class="form-group">
            <textarea class="form-control mt-2" rows="5" readonly><?= $obPergunta->conteudo ?></textarea>
        </div>

        <!-- Campo para responder -->

        <div class="form-group">
            <fieldset class="mt-4">Escreva sua resposta</fieldset>
            <textarea class="form-control mt-2" name="conteudo" id="conteudo" rows="3"></textarea>
        </div>

        <!-- Botão responder -->
        <div class="form-group">
            <button type="submit" class="btn btn-success mt-3 mb-4"><?= BUTTON ?></button>
        </div>

        <h4 class="mb-2">Comentários</h4>

        <!-- Lista de resposta para a pergunta -->
        <section class="mt-2">
            <table class="table mt-2">
                <tbody class="tentando-muito">
                    <?= $listrespostas ?>
                </tbody>
            </table>
        </section>

    </form>

</main>