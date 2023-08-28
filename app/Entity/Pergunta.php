<?php

namespace App\Entity;

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
    public $id;

    /**
     * Título da pergunta
     * @var string
     */
    public $titulo;

    /**
     * Contéudo descrito na pergunta
     * @var string
     */
    public $conteudo;

    /**
     * Data de criação da pergunta
     * @var string
     */
    public $data;

    /**
     * Método responsável por realizar o cadastro da pergunta
     * no banco de dados
     * @return boolean
     */
    public function cadastrar()
    {
        // DEFINIR A DATA
        $this->data = date('Y-m-d H:i:s');


        // INSERIR A PERGUNTA NO BANCO DE DADOS

        // ATRIBUIR O ID DA PERGUNTA NA INSTÂNCIA

        // RETORNAR SUCESSO
    }
}
