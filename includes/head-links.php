<?php
/* 
head-links foi criado para separar a colocação de links do header
assim da para colocar folhas de estilo diferentes para cada página
*/

use \App\Session\Login;

// DADOS DO USUÁRIO LOGADO
$usuarioLogado = Login::getUsuarioLogado();

// DETALHES DO USUÁRIO
$usuario = $usuarioLogado ?
    $usuarioLogado['nome'] . ' <a href="logout.php" class="font-weight-bold ml-4"> Sair </a>' :
    'Visitante <a href="login.php" class="font-weight-bold ml-4 p-2">Entrar</a>';

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

    <!-- fonte e icones do google -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- font awesome -->
    <link rel="stylesheet" href="./includes/fontawesome/css/all.min.css">

    <!-- estilos -->
    <link rel="stylesheet" href="./includes/css/constants.css">
    <link rel="stylesheet" href="./includes/css/global.css">
    