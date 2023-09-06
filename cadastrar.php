<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="./includes/css/style.css">
    <link rel="stylesheet" href="./includes/css/autenticacao.css">
</head>


define('TITLE', 'Qual a sua pergunta?');
define('BUTTON', 'Perguntar');

use \App\Entity\Pergunta;
$obPergunta = new Pergunta;

// Verifica se as informações de `cadastrar.php` foram recebidas com sucesso
if (isset($_POST['titulo'], $_POST['conteudo'])) {
    // Instância a Pergunta
    $obPergunta->perguntas_titulo   = $_POST['titulo'];
    $obPergunta->perguntas_conteudo = $_POST['conteudo'];
    $obPergunta->cadastrar();

    // RETORNA PARA O INDEX
    header('location: index.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';

<body>
    <!-- Bloco principal -->
    <main class="auPrincipal">
        <!-- Titulo -->
        <hgroup>
            <h1 class="auTitulo">IdeaHub</h1>
            <h2>Feito por alunos para alunos</h2>
        </hgroup>
        <!-- Formulario de login -->
        <form class="auCaixa-form" action="">
            <h2>cadastro</h2>
            <!-- inputs -->
            <div class="auCaixa-input">
                <input type="text" placeholder=" " required="required">
                <span>
                    <i class="material-symbols-outlined iconGoogle">person</i>
                    Nome
                </span>
            </div>
            <div class="auCaixa-input">
                <input type="email" placeholder=" " required="required">
                <span>
                    <i class="material-symbols-outlined iconGoogle">mail</i>
                    Email
                </span>
            </div>
            <div class="auCaixa-input">
                <input type="password" placeholder=" " required="required">
                <span>
                    <i class="material-symbols-outlined iconGoogle">lock</i>
                    Senha
                </span>
            </div>
            <div class="auBotoes">
                <!-- Botão de enviar -->
                <input type="submit" value="Cadastrar">
                <!-- extra -->
                <div>
                    <span class="auExtra">Já tem conta?
                        <a class="auExtra auLink" tabindex="0" href="login.php
                        ">Entrar</a>
                    </span>
                </div>
            </div>
        </form>
    </main>
</body>

</html>

