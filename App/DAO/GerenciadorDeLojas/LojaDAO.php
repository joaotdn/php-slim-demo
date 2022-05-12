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

    public function getById(int $id): int {
        $loja = $this->pdo
            ->query('SELECT id FROM loja WHERE id = :id);')
            ->fetch();
        $loja->execute(['id' => $id]);

        return $loja;
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

    public function update(LojaModel $loja): void {
        $statement = $this->pdo
            ->prepare('UPDATE loja SET
                nome = :nome,
                telefone = :telefone,
                endereco = :endereco
                WHERE id = :id;
            ');
        $statement->execute([
            'nome' => $loja->getNome(),
            'telefone' => $loja->getTelefone(),
            'endereco' => $loja->getEndereco(),
            'id' => $loja->getId()
        ]);
    }

    public function delete(int $id): void {
        $statement = $this->pdo
            ->prepare('DELETE FROM produto WHERE loja_id = :id;
                DELETE FROM loja WHERE id = :id;
            ');
        $statement->execute([
            'id' => $id
        ]);
    }
}