<?php
namespace App\controllers;

use App\DAO\GerenciadorDeLojas\LojaDAO;
use App\models\GerenciadorDeLojas\LojaModel;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class LojaController {

    public function getLojas(Request $request, Response $response, array $args): Response {
        $lojasDAO = new LojaDAO();
        $payload = json_encode($lojasDAO->getAll());
        $response->getBody()->write($payload);
        return $response;
    }

    public function insertLoja(Request $request, Response $response, array $args): Response {
        $data = $request->getParsedBody();

        $lojasDAO = new LojaDAO();
        $loja = new LojaModel();
        $loja->setNome($data['nome'])
             ->setEndereco($data['endereco'])
             ->setTelefone($data['telefone']);
        $lojasDAO->add($loja);

        $payload = json_encode([
            'message' => 'Loja inserida com sucesso!'
        ]);
        $response->getBody()->write($payload);
        return $response;
    }
    
    public function updateLoja(Request $request, Response $response, array $args): Response {
        $data = $request->getParsedBody();

        $lojaDAO = new LojaDAO();
        $loja = new LojaModel();
        $loja->setId((int)$data['id'])
             ->setNome($data['nome'])
             ->setTelefone($data['telefone'])
             ->setEndereco($data['endereco']);
        $lojaDAO->update($loja);

        $payload = json_encode([
            'message' => 'Loja atualizada com sucesso'
        ]);
        $response->getBody()->write($payload);

        return $response;
    }
    
    public function deleteLoja(Request $request, Response $response, array $args): Response {
        $queryParams = $request->getQueryParams();
        
        $lojaDAO = new LojaDAO();
        $id = (int)$queryParams['id'];
        $lojaDAO->delete($id);

        $payload = json_encode([ 'message' => 'Loja deletada com sucesso!' ]);
        $response->getBody()->write($payload);

        return $response;
    }

}