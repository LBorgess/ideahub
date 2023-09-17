<main>

    <h4 class="mt-3">Excluir pergunta</h4>

    <!-- Formulário de cadastro da pergunta, não possui action pois sempre fica na mesma "pagina" -->

    <form method="post">

        <div class="form-group">
            <p>Você realmente deseja excluir a pergunta realizada sobre <strong> <?= $obPergunta->titulo ?> </strong>?</p>
        </div>

        <div class="form-group">
            <div class="d-flex align-items-start">
                <a href="index.php">
                    <button type="button" class="btn btn-info mr-3">Cancelar</button>
                </a>
                <div class="d-flex align-items-end">
                    <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
                </div>
            </div>
        </div>

    </form>

</main>