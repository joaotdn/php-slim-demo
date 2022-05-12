<?php

namespace App\models\GerenciadorDeLojas;

final class ProdutoModel {
    private $id;
    private $loja_id;
    private $nome;
    private $quantidade;
    private $preco;

    public function getId(): int {
        return $this->id;
    }

    public function getLojaId(): int {
        return $this->loja_id;
    }
    public function setLojaId(int $loja_id) {
        $this->$loja_id = $loja_id;
    }

    public function getNome(): string {
        return $this->nome;
    }
    public function setNome(string $nome): ProdutoModel {
        $this->nome = $nome;
        return $this;
    }
    
    public function getQuantidade(): int {
        return $this->quantidade;
    }
    public function setQuantidade(int $quantidade): ProdutoModel {
        $this->quantidade = $quantidade;
        return $this;
    }

    public function getPreco(): float {
        return $this->preco;
    }
    public function setPreco(float $preco): ProdutoModel {
        $this->preco = $preco;
        return $this;
    }
}