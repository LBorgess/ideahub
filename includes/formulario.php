<main>

    <div class="nav justify-content-end">
        <section">
            <a href="index.php">
                <button class="btn btn-info">Voltar</button>
            </a>
        </section>        
    </div>

    <h4 class="mt-3"><?=TITLE?></h4>

    <!-- Formulário de cadastro da pergunta, não possui action pois sempre fica na mesma "pagina" -->

    <form method="post">
        
        <div class="form-group">
            <label for="titulo">Titulo da pergunta</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="<?=$obPergunta->perguntas_titulo?>">
            <small class="form-text text-muted">Use sua criatividade</small>
        </div>

        <div class="form-group">
            <label for="conteudo">Descrição</label>
            <textarea name="conteudo" id="conteudo" class="form-control" rows="5"><?=$obPergunta->perguntas_conteudo?></textarea>
            <small class="form-text text-muted">Seja detalhista</small>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success"><?=BUTTON?></button>
        </div>


    <h2>Qual a sua pergunta?</h2>
    <form class="pCaixa-inputs" method="POST" action="index.php">
        <label for="titulo">Descrição</label>
        <textarea class="pInput pTitulo" type="text" id="titulo" name="titulo" placeholder="Titulo..." rows="1" maxlength="100" cols="50" required></textarea>
        <small>Seja criativo!</small>
        <br>
        <label for="conteudo">Descrição</label>
        <textarea class="pInput pTexto" type="text" id="conteudo" name="conteudo" placeholder="Pergunta..." rows="4" cols="50" required></textarea>
        <small>Seja detalhista!</small>
        <button type="submit">Postar pergunta</button>

    </form>
</main>