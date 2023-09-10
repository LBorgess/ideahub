<?php

namespace App\DB;

/**
 * Classe responsável por realizar a paginação da página
 * @author LBorgess
 */
class Pagination
{
    /**
     * Número máximo de registro por página
     * @var integer
     */
    private $limit;

    /**
     * Quantidade total de resultador do banco de dados
     * @var integer
     */
    private $results;

    /**
     * Quantidade de páginas
     * @var integer
     */
    private $pages;

    /**
     * Página atual
     * @var integer
     */
    private $currentPage;

    /**
     * Contrutor da classe
     * @param integer $results
     * @param integer $currentPage
     * @param integer $limit
     */
    public function __construct($results, $currentPage = 1, $limit = 10)
    {
        $this->results = $results;
        $this->limit = $limit;
        $this->currentPage = (is_numeric($currentPage) and $currentPage > 0) ? $currentPage : 1;
        $this->calculate();
    }

    /**
     * Método resposável por calcular a páginação
     */
    private function calculate()
    {
        // CALCULA O TOTAL DE PÁGINAS
        $this->pages = $this->results > 0 ? ceil($this->results / $this->limit) : 1;

        // VERIFICA SE A PÁGINA NÃO EXCEDE O NÚMERO DE PÁGINAS
        $this->currentPage = $this->currentPage <= $this->pages ? $this->currentPage : $this->pages;
    }

    /**
     * Método responsável por retornar a cláusula limit do SQL
     * @return string
     */
    public function getLimit()
    {
        $offset = ($this->limit * ($this->currentPage - 1));
        return $offset . ',' . $this->limit;
    }

    /**
     * Método responsável por retornar as opções de página disponiveis
     * @return array
     */
    public function getPages()
    {
        // NÃO RETORNA PÁGINAS
        if ($this->pages == 1) return [];

        // PAGINAS
        $paginas = [];

        for ($i = 1; $i <= $this->pages; $i++) {
            $paginas[] = [
                'pagina' => $i,
                'atual'  => $i == $this->currentPage
            ];
        }

        return $paginas;
    }
}
