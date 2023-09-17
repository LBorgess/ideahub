<?php

require __DIR__ . '/vendor/autoload.php';

use \App\Entity\Usuario;
use \App\Session\Login;

// OBRIGA O USUÁRIO A ESTAR DESCONECTADO
Login::requireLogout();

// MENSAGENS DE ALERTA DOS FORMULARIOS
$alertaLogin = '';
$alertaCadastro = '';

// VALIDAÇÃO DO POST
if (isset($_POST['acao'])) {
    switch ($_POST['acao']) {
        case 'logar':

            // BUSCA USUÁRIO POR E-MAIL
            $obusuario = Usuario::getUsuarioPorEmail($_POST['email']);

            // VALIDA A INSTÂNCIA E A SENHA
            if (!$obusuario instanceof Usuario || !password_verify($_POST['senha'], $obusuario->senha)) {
                $alertaLogin = 'E-mail ou senha inválidos.';
                break;
            }

            // LOGA O USUARIO
            Login::login($obusuario);

            break;
        case 'cadastrar':

            // VALIDAÇÃO DOS CAMPOS RECEBIDOS NO FORMULÁRIO
            if (isset($_POST['nome'], $_POST['email'], $_POST['senha'])) {

                // BUSCA USUÁRIO POR E-MAIL
                $obusuario = Usuario::getUsuarioPorEmail($_POST['email']);
                if ($obusuario instanceof Usuario) {
                    $alertaCadastro = 'E-mail já cadastrado.';
                    break;
                }

                $obusuario = new Usuario();
                $obusuario->nome  = $_POST['nome'];
                $obusuario->email = $_POST['email'];
                $obusuario->senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
                $obusuario->cadastrar();

                // LOGA O USUARIO
                Login::login($obusuario);
            }

            break;
    }
}

// inclue head-links primeiro para adicionar CSS especifico
include __DIR__ . '/includes/head-links.php';

?>

<link rel="stylesheet" href="./includes/css/autenticacao.css">

<?php 

// include __DIR__ . '/includes/header.php'; - pagina login não tem o header
include __DIR__ . '/includes/formulario-login.php';
include __DIR__ . '/includes/footer.php';
