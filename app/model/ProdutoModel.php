<?php

namespace app\model;

use app\core\Model;

/**
 * Classe responsável por genrenciar a conexão com a tabela produto
 */
class ProdutoModel {

    //Instância da classe model
    private $pdo;

    /**
     * Método construtor
     *
     * @return void
     */
    public function __construct() {
        $this->pdo = new Model();
    }

    /**
     * Insere um novo registro na tabela de produtos e retorna seu ID em caso de sucesso
     *
     * @param  Object $params Lista com os parâmetros a serem inseridos
     * @return int Retorna o ID do produto inserido e -1 em caso de erro
     */
    public function insert(object $params) {

        $sql = 'INSERT INTO produto (nome, imagem, descricao) VALUES (:nome, :imagem, :descricao)';

        $params = [
            ':nome'     => $params->nome,
            ':imagem'   => $params->imagem,
            ':descricao' => $params->descricao
        ];

        if(!$this->pdo->executeNonQuery($sql, $params))
        return -1;//Código de erro

        return $this->pdo->getLastID();
    }

    /**
     * Atualiza um registro na base de dados através do ID do produto
     *
     * @param  Object $params
     * @return bool True em caso de sucesso e False em caso de erro
     */
    public function update(object $params) {
        $sql = 'UPDATE produto SET nome = :nome, imagem = :imagem, descricao = :descricao WHERE id = :id';

        $params = [
            'id'        => $params->id,
            ':nome'     => $params->nome,
            ':imagem'   => $params->imagem,
            'descricao' => $params->descricao
        ];

        return $this->pdo->executeNonQuery($sql, $params);
    }

    /**
     * Retorna todos os registros da base de dados em ordem ascendente por nome
     *
     * @return arr[object]
     */
    public function getAll() {

        $sql = 'SELECT id, nome, imagem, descricao FROM produto ORDER BY nome ASC';

        $dt = $this->pdo->executeQuery($sql);
        $listaProduto = null;

        foreach($dt as $dr)
            $listaProduto[] = $this->collection($dr);

        return $listaProduto;
    }

    /**
     * Retorna um único registro da base de dados através do ID informado
     *
     * @param  int $id ID do objeto a ser retornado
     * @return object Retorna um objeto populado com os dados do produto ou se não encontrar om seus valores nulos
     */
    public function getById(int $id) {
        $sql = 'SELECT id, nome, imagem, descricao FROM produto WHERE id = :id';

        $param = [
            ':id' => $id
        ];

        $dr = $this->pdo->executeQueryOneRow($sql, $param);
        return $this->collection($dr);
    }

    /**
     * Converte uma estrutura de array vinda da base de dados em um objeto devidamente tratado
     *
     * @param  array|object $param Recebe o parâmetro que é retornado na consulta com a base de dados
     * @return object Retorna um objeto devidamente tratado com a estrutura de produtos
     */
    private function collection($param) {
        return (object)[
            'id'        => $param['id']         ?? null,
            'nome'      => $param['nome']       ?? null,
            'imagem'    => $param['imagem']     ?? null,
            'descricao' => $param['descricao']  ?? null
        ];
    }
}