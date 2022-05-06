<?php

namespace App\DAO\GerenciadorDeLojas;

use App\models\GerenciadorDeLojas\LojaModel;

class LojaDAO extends Connect {

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll(): array {
        $lojas = $this->pdo
            ->query('SELECT * FROM loja')
            ->fetchAll(\PDO::FETCH_ASSOC);
        
        return $lojas;
    }

    public function add(LojaModel $loja): void {
        $statement = $this->pdo
            ->prepare('INSERT INTO loja VALUES(
                null,
                :nome,
                :telefone,
                :endereco
            );');
        $statement->execute([
            'nome' => $loja->getNome(),
            'telefone' => $loja->getTelefone(),
            'endereco' => $loja->getEndereco()
        ]);
    }
}