<?php

namespace App\controllers;

use App\DAO\GerenciadorDeLojas\ProdutoDAO;
use App\models\GerenciadorDeLojas\ProdutoModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class ProdutoController {
    
    public function getProdutos(Request $request, Response $response, array $args): Response {
        $produtoDAO = new ProdutoDAO();
        $payload  = json_encode($produtoDAO->getAll());
        $response->getBody()->write($payload);
        return $response;
    }

    public function insertProduto(Request $request, Response $response, array $args): Response {
        $data = $request->getParsedBody();

        $produto = new ProdutoModel();
        $produtoDAO = new ProdutoDAO();
        $produto->setLoja($data['loja_id'])
                ->setNome($data['nome'])
                ->setQuantidade($data['quantidade'])
                ->setPreco($data['preco']);
        $produtoDAO->add($produto);
        
        $payload = json_encode([ 'message' => 'Produto inserido com sucesso!' ]);
        $response->getBody()->write($payload);

        return $response;
    }

    public function updateProduto(Request $request, Response $response, array $args): Response {
        // TODO implements update products
        return $response;
    }

    public function deleteProduto(Request $request, Response $response, array $args): Response {
        // TODO implements delete products
        return $response;
    }
}