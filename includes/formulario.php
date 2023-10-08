<div class="formulario px-5">
    <h4 class="mt-3 text-center"><?=TITLE?></h4>
    <!-- Formulário de cadastro da pergunta, não possui action pois sempre fica na mesma "pagina" -->

    <form method="post">
        
        <div class="form-group">
            <label for="busca">Titulo da pergunta</label>
            <input type="text" name="busca" id="busca" class="form-control" value="<?= $busca ?>" required>
            <small class="form-text text-muted">Use sua criatividade</small>
        </div>

        <div class="form-group">
            <label for="conteudo">Descrição</label>
            <textarea name="conteudo" id="conteudo" class="form-control" rows="5" required><?=$obPergunta->conteudo?></textarea>
            <small class="form-text text-muted">Seja detalhista</small>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success"><?=BUTTON?></button>
        </div>
    </form>
</div>