<?php

namespace App\Entity;

use App\DB\Database;

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
}
