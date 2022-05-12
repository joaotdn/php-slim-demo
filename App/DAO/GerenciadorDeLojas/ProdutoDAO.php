<?php

namespace App\DAO\GerenciadorDeLojas;

use App\models\GerenciadorDeLojas\LojaModel;
use App\models\GerenciadorDeLojas\ProdutoModel;
use App\DAO\GerenciadorDeLojas\LojaDAO;

class ProdutoDAO extends Connect {
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll(): array {
        $produtos = $this->pdo
            ->query('SELECT * FROM produto')
            ->fetchAll(\PDO::FETCH_ASSOC);
        
        return $produtos;
    }

    public function add(ProdutoModel $produto): void { 
        $statement = $this->pdo
            ->prepare('INSERT INTO produto VALUES(
                null,
                :loja_id
                :nome,
                :quantidade,
                :preco
            );');
        $statement->execute([
            'loja_id' => $produto->getLojaId(),
            'nome' => $produto->getNome(),
            'quantidade' => $produto->getQuantidade(),
            'preco' => $produto->getPreco()
        ]);
    }

    public function update(ProdutoModel $produto): void {
        $statement = $this->pdo
        ->prepare('UPDATE produto SET
            loja_id = :loja_id,
            nome = :nome,
            quantidade = :quantidade,
            preco = :preco
            WHERE id = :id
        ');
        $statement->execute([
            'loja_id' => $produto->getLojaId(),
            'nome' => $produto->getNome(),
            'quantidade' => $produto->getQuantidade(),
            'preco' => $produto->getPreco()
        ]);
    }

    public function delete(int $id): void {
        $statement = $this->pdo
            ->prepare('DELETE FROM produto WHERE id = :id;');
        $statement->execute([
            'id' => $id
        ]);
    }
}