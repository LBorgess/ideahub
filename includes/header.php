<?php

use \App\Session\Login;

// DADOS DO USUÁRIO LOGADO
$usuarioLogado = Login::getUsuarioLogado();

// DETALHES DO USUÁRIO
$usuario = $usuarioLogado ?
    $usuarioLogado['nome'] . ' <a href="logout.php" class="font-weight-bold ml-4"><span class="header-link">&nbsp&nbspSair</span></a>' :
    '<span>Visitante</span><a href="login.php" class="font-weight-bold ml-4 p-2"><span class="header-link">Entrar</span></a>';

// CAMPO DE PESQUISA

$pesquisa = $usuarioLogado ?
    '<section>
        <form method="get">
            <div class="row my-4">
                <div class="col">
                    <input type="text" name="busca" id="busca" class="form-control" placeholder="Pesquisar">
                </div>
        </form>
    </section>' : '';

?>

<!doctype html>
<html lang="pt-BR">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS 4-->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->

    <!-- Bootstrap CSS 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Bootstrap CSS 5 Local -->
    <link rel="stylesheet" href="./includes/css/bootstrap5.min.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="./includes/fontawesome/css/all.min.css">

    <!-- Meu estilo -->
    <link rel="stylesheet" href="./includes/css/style.css">

    <title class="logo">Ideahub</title>
</head>

<body class="bg-dark text-light">

    <!-- <div class="container"> -->
        <header id="header">
            <a id="logo" href="index.php">Ideahub</a>

            <?= $pesquisa ?>

            <nav id="nav">
                
                <button aria-label="Abrir menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu" aria-expanded="false">Menu
                    <span id="hamburger"></span>
                </button>
                <div class="d-flex justify-content-start">
                    <a href="cadastrar.php">
                        <button class="btn btn-info mt-2 nova-pergunta" > <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
</svg> Nova pergunta</button>
                    </a>
                    <span class="usuario"><?= $usuario ?></span>
                </div>
            </nav>
        </header>
        <div class="container">