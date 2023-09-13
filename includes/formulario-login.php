<?php

$alertaLogin = strlen($alertaLogin) ? '<div class="alert alert-danger">' . $alertaLogin . '</div>' : '';
$alertaCadastro = strlen($alertaCadastro) ? '<div class="alert alert-danger">' . $alertaCadastro . '</div>' : '';

?>

<!-- Bloco principal -->
<main class="auPrincipal">
    <!-- Titulo -->
    <hgroup>
        <h1 class="auTitulo">IdeaHub</h1>
        <h2>Feito por alunos para alunos</h2>
    </hgroup>
    <!-- Formulario de login -->
    <form class="auCaixa-form" method="post">
        <h2>Login</h2>

        <?= $alertaLogin ?>

        <!-- input 1 -->
        <div class="auCaixa-input">
            <input type="email" name="email" placeholder=" " required="required">
            <span>
                <i class="material-symbols-outlined iconGoogle">mail</i>
                Email
            </span>
        </div>
        <div class="auCaixa-input">
            <input type="password" name="senha" placeholder=" " required="required">
            <span>
                <i class="material-symbols-outlined iconGoogle">lock</i>
                Senha
            </span>
        </div>
        <div class="auBotoes">
            <!-- Botão de enviar -->
            <input type="submit" name="acao" value="logar">
            <!-- extra -->
            <div class="auCaixa-extra">
                <a class="auExtra auLink" tabindex="0" href="#">Esqueceu a senha?
                </a>
                <span class="auExtra">
                    Não tem conta?
                    <a class="auExtra auLink" tabindex="0" href="cadastro.html">
                        Cadastrar
                    </a>
                </span>
            </div>
        </div>
    </form>
</main>


<!-- <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" class="form-control" require>
                </div>

                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" class="form-control" require>
                </div>

                <div class="form-group">
                    <button type="submit" name="acao" value="logar" class="btn btn-primary mt-2">Entrar</button>
                </div>

            </form>
        </div>

<div class="col">
    <form method="post">
        <h2>Cadastre-se</h2>

        <?= $alertaCadastro ?>

        <div class="form-group">
            <label for="email">Nome</label>
            <input type="text" name="nome" class="form-control" require>
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" class="form-control" require>
        </div>

        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" name="senha" class="form-control" require>
        </div>

        <div class="form-group">
            <button type="submit" name="acao" value="cadastrar" class="btn btn-primary mt-2">Cadastrar</button>
        </div>

    </form>
</div>

</div>

</div> -->