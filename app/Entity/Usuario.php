<?php

namespace App\Entity;

use App\DB\Database;
use \PDO;

/**
 * Classe responsável por criar e executar as propriedades do usuário
 */
class Usuario
{
    /**
     * Identificador único do usuário
     * @var integer
     */
    public $id;

    /**
     * Nome do usuário
     * @var string
     */
    public $nome;

    /**
     * Email do usuário
     * @var string
     */
    public $email;

    /**
     * Hash da senha do usuário
     * @var string
     */
    public $senha;

    /**
     * Método responsável por realizar o cadastro do usuário no banco de dados
     * @return boolean
     */
    public function cadastrar()
    {
        // DATABASE
        $obDatabase = new Database('usuarios');

        // NOME DO BANCO COM O NOME DA VARIAVEL
        // INSERE NOVO USUÁRIO
        $this->id = $obDatabase->insert([
            'nome'  => $this->nome,
            'email' => $this->email,
            'senha' => $this->senha
        ]);

        // SUCESSO
        return true;
    }

    /**
     * Método responsável por retornar uma instância de usuário com base em seu e-mail
     * @param string $email
     * @return Usuario
     */
    public static function getUsuarioPorEmail($email)
    {
        return (new Database('usuarios'))->select('email = "'.$email.'"')->fetchObject(self::class);
    }
}
