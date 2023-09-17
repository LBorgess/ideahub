<?php

$alertaLogin = strlen($alertaLogin) ? '<div class="alert alert-danger">' . $alertaLogin . '</div>' : '';

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
            <input type="email" name="email" placeholder=" " value="<?php if (isset($_POST['acao'])) echo htmlspecialchars($_POST['email'])?>">
            <span>
                <i class="material-symbols-outlined iconGoogle">mail</i>
                Email
            </span>
        </div>
        <div class="auCaixa-input">
            <input type="password" name="senha" placeholder=" ">
            <span>
                <i class="material-symbols-outlined iconGoogle">lock</i>
                Senha
            </span>
        </div>
        <div class="auBotoes">
            <!-- Botão de enviar -->
            <input type="submit" class="btn-primary px-4 " name="acao" value="logar">
            <!-- extra -->
            <div class="auCaixa-extra px-2">
                <span class="auExtra">
                    Não tem conta?
                    <a class="auExtra auLink" tabindex="0" href="cadastro.php">
                        Cadastrar
                    </a>
                </span>
            </div>
        </div>
    </form>
    
</main>