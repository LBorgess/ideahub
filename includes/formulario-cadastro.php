<?php

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
        <h2>Cadastro</h2>

        <?= $alertaCadastro ?>

        <!-- input 1 -->
        <div class="auCaixa-input">
            <input type="text" name="nome" placeholder=" " required>
            <span>
                <i class="material-symbols-outlined iconGoogle">person</i>
                Nome de usuario
            </span>
        </div>
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
            <input type="submit" class="btn-primary px-4 " name="acao" value="Cadastrar">
            <!-- extra -->
            <div class="auCaixa-extra px-2">
                <span class="auExtra">
                    Já tem conta?
                    <a class="auExtra auLink" tabindex="0" href="login.php">
                        Entrar
                    </a>
                </span>
            </div>
        </div>
    </form>
    
</main>