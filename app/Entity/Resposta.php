<?php

namespace App\Entity;

use App\DB\Database;
use \PDO;
use App\Session\Login;
use App\Entity\Pergunta;

/**
 * Classe responsável por abstratir a parte de incluir as respostas das perguntas
 * no banco de dados
 * @author LBorgess
 */
class Resposta
{
    /**
     * Código único de identificação da resposta
     * @var integer
     */
    public $id;

    /**
     * Código de identificação da pergunta
     * @var integer
     */
    public $perguntas_id;

    /**
     * Código de identificação do usuário que respondeu
     * @var integer
     */
    public $usuario_id;

    /**
     * Conteúdo da resposta
     * @var string
     */
    public $conteudo;

    /**
     * Data da criação da resposta
     * @var string
     */
    public $data;

    /**
     * Método responsável por realizar o cadastro da pergunta no banco de dados
     * @return boolean
     */
    public function cadastrar()
    {
        // DATETIME
        date_default_timezone_set('America/Sao_Paulo');
        $this->data = date('Y-m-d H:i:s');

        // INSTÂNCIA DO BANCO DE DADOS
        $obDatabase = new Database('respostas');

        $this->perguntas_id = $_GET['id'];

        // USUÁRIO LOGADO
        $user = Login::getUsuarioLogado();
        $this->usuario_id = $user['id'];

        // ARRAY DE CHAVE-VALOR DAS INFORMAÇÕES QUE SERÃO INSERIDAS NO BANCO DE DADOS
        $this->id = $obDatabase->insert([
            'perguntas_id' => $this->perguntas_id,
            'usuarios_id' => $this->usuario_id,
            'conteudo' => $this->conteudo,
            'data'     => $this->data
        ]);

        return true;
    }

    /**
     * Método responsável por realizar a atualização do conteúdo da resposta no
     * banco de dados
     * @return boolean
     */
    public function atualizar()
    {
        return (new Database('respostas'))->update('id = ' . $this->id, [
            'conteudo' => $this->conteudo,
            'data'     => $this->data
        ]);
    }

    /**
     * Método responsável por excluir a resposta do banco de dados
     * @return boolean
     */
    public function excluir()
    {
        return (new Database('respostas'))->delete('id = ' . $this->id);
    }

    /**
     * Método resposnável por obter as respostas do banco de dados
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */
    public static function getRespostas($where = null, $order = null, $limit = null)
    {
        // EXIBE AS RESPOSTAS ORDENADO PELA DATA
        $order = 'data DESC';

        return (new Database('respostas'))->select($where, $order, $limit)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Método responsável por buscar uma única resposta com base em seu ID
     *
     * @param integer $id
     * @return Resposta
     */
    public static function getResposta($id)
    {
        return (new Database('respostas'))->select('id = ' . $id)
            ->fetchObject(self::class);
    }
}
