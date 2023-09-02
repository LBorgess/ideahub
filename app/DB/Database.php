<?php

namespace App\DB;

use \PDO;
use \PDOException;

/**
 * Classe responsável por realizar as operações com o banco de dados
 * @author LBorgess
 */
class Database
{
    /**
     * HOST de conexão com o banco de dados
     * @var string
     */
    const HOST = 'localhost';

    /**
     * Nome do banco de dados
     * @var string
     */
    const NAME = 'ideahub';

    /**
     * Usuário do banco de dados
     * @var string
     */
    const USER = 'root';

    /**
     * Senha de acesso ao banco de dados
     * @var string
     */
    const PASS = '';

    /**
     * Nome da tabela que será manipulada
     * @var string
     */
    private $table;

    /**
     * Instância de conexão com o banco de dados
     * @var PDO
     */
    private $connection;

    /**
     * Define a tabela que será utilizada e instância a conexão
     * @param string $table
     */
    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    /**
     * Método responsável por criar uma conexão com o banco de dados
     */
    private function setConnection()
    {
        // TENTA REALIZAR UMA CONEXÃO COM O BANCO DE DADOS
        try {
            // INFORMAÇÕES PARA REALIZAR A CONEXÃO
            $this->connection = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::NAME, self::USER, self::PASS);

            // INFORMA O ERRO QUE POSSA OCORRER COM ALGUMA QUERY SQL EXECUTADA
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // CASO A CONEXÃO FALHE, EXIBIRÁ ESSE ERRO
            die('HOUVE UM ERRO: ' . $e->getMessage());
        }
    }
}
