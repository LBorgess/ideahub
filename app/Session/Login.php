<?php

namespace App\Session;

/**
 * Classe responsável por realizar as operações com a sesão de login
 * @author LBorgess
 */
class Login
{
    /**
     * Método responsável por iniciar a sessão do usuário
     */
    private static function init()
    {
        // VERIFICA STATUS DA SESSÃO
        if (!isset($_SESSION)) {
            // INICIA A SESSÃO
            session_start();
        }
    }

    /**
     * Método resposnável por retornar os dados do usuário logado
     * @return array
     */
    public static function getUsuarioLogado()
    {
        self::init();

        // RETORNA OS DADOS DO USUARIO
        return self::isLogged() ? $_SESSION['usuario'] : null;
    }

    /**
     * Método responsável por logar o usuário
     * @param Usuario $obUsuario
     */
    public static function login($obUsuario)
    {
        self::init();

        // SESSÃO DO USUÁRIO
        $_SESSION['usuario'] = [
            'id'    => $obUsuario->id,
            'nome'  => $obUsuario->nome,
            'email' => $obUsuario->email
        ];

        // REDIRECIONA PARA INDEX
        header('location: index.php');
        exit;
    }

    /**
     * Método responsável por realizar o logout do usuário
     */
    public static function logout()
    {
        // INICIA A SESSÃO
        self::init();

        // REMOVE A SESSÃO DO USUARIO 
        unset($_SESSION['usuario']);

        // REDIRECIONA PARA LOGIN
        header('location: login.php');
        exit;
    }

    /**
     * Método responsável por verificar se o usuário está logado
     * @return boolean
     */
    public static function isLogged()
    {
        self::init();

        // VALIDAÇÃO DA SESSÃO
        return isset($_SESSION['usuario']['id']);
    }

    /**
     * Método responsável por obrigar o usuário a estar logado no sistema
     */
    public static function requireLogin()
    {
        if (!self::isLogged()) {
            header('location: login.php');
            exit;
        }
    }

    /**
     * Método responsável por obrigar o usuário a estar desconectado do sistema
     */
    public static function requireLogout()
    {
        if (self::isLogged()) {
            header('location: index.php');
            exit;
        }
    }
}
