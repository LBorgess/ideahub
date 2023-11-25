<?php

use \App\Session\Login;

// DADOS DO USUÁRIO LOGADO
$usuarioLogado = Login::getUsuarioLogado();

// DETALHES DO USUÁRIO
$usuario = $usuarioLogado ?
    $usuarioLogado['nome'] . ' <a href="logout.php" class="font-weight-bold ml-4">&nbsp&nbspSair</a>' :
    '<span>Visitante</span><a href="login.php" class="font-weight-bold ml-4 p-2">Entrar</a>';

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

    <div class="container">
        <header id="header">
            <a id="logo" href="index.php">Ideahub</a>

            <?= $pesquisa ?>

            <nav id="nav">
                <button aria-label="Abrir menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu" aria-expanded="false">Menu
                    <span id="hamburger"></span>
                </button>
                <div class="d-flex justify-content-start text-dark">
                    <?= $usuario ?>
                </div>
            </nav>
        </header>