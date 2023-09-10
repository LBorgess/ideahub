<?php

namespace App\Entity;

use App\DB\Database;
use \PDO;

/**
 * Class responsável por abstratir a parte de incluir as perguntas no banco de dados
 * @author LBorgess
 */
class Pergunta
{
    /**
     * Código de identificação único da pergunta
     * @var integer
     */
    public $perguntas_id;

    /**
     * Título da pergunta
     * @var string
     */
    public $perguntas_titulo;

    /**
     * Contéudo descrito na pergunta
     * @var string
     */
    public $perguntas_conteudo;

    /**
     * Data de criação da pergunta
     * @var string
     */
    public $perguntas_data;

    /**
     * Método responsável por realizar o cadastro da pergunta
     * no banco de dados
     * @return boolean
     */
    public function cadastrar()
    {   
        // DEFINIÇÃO DO TIMEZONE BRASILEIRO
        date_default_timezone_set('America/Sao_Paulo');
        // DEFINIR A DATA
        $this->perguntas_data = date('Y-m-d H:i:s');

        // INSERIR A NOVA PERGUNTA NO BANCO DE DADOS
        $obDatabase = new Database('perguntas');

        // ARRAY DO TIPO CHAVE-VALOR QUE VAI INSERIR OS DADOS NO BANCO
        $this->perguntas_id = $obDatabase->insert([
            'perguntas_titulo'   => $this->perguntas_titulo,
            'perguntas_conteudo' => $this->perguntas_conteudo,
            'perguntas_data'     => $this->perguntas_data
        ]);

        // RETORNAR SUCESSO
        return true;
    }

    /**
     * Método responsável por realizar a atualização da pergunta no banco de dados
     * @return boolean
     */
    public function atualizar()
    {
        return (new Database('perguntas'))->update('perguntas_id = ' . $this->perguntas_id, [
            'perguntas_titulo'   => $this->perguntas_titulo,
            'perguntas_conteudo' => $this->perguntas_conteudo,
            'perguntas_data'     => $this->perguntas_data
        ]);
    }

    /**
     * Método responsável por excluir a pergunta do banco de dados
     * @return boolean
     */
    public function excluir()
    {
        return (new Database('perguntas'))->delete('perguntas_id = ' . $this->perguntas_id);
    }

    /**
     * Método responsável por obter as perguntas no banco de dados
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */
    public static function getPerguntas($where = null, $order = null, $limit = null)
    {
        return (new Database('perguntas'))->select($where, $order, $limit)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Método responsável por obter a quantidade de perguntas no banco de dados
     * @param string $where
     * @return integer
     */
    public static function getQuantidadePerguntas($where = null)
    {
        return (new Database('perguntas'))->select($where, null, null, ' COUNT(*) as qtd')
            ->fetchObject()
            ->qtd;
    }

    /**
     * Método responsável por buscar uma pergunta com base em seu ID
     * @param integer $id
     * @return Pergunta
     */
    public static function getPergunta($id)
    {
        return (new Database('perguntas'))->select('perguntas_id = ' . $id)
            ->fetchObject(self::class);
    }
}
