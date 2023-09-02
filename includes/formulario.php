<main>
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