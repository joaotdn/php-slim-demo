<?php

namespace App\controllers;

use App\DAO\SlimFramework\LojaDAO;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class ProductController {
    
    /**
     * Get products collection
     *
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return Response
     */
    public function getProducts(Request $request, Response $response, array $args): Response {
        /**
         * Slim 3
         * $reponse = $response->withJson(array);
         */
        $payload = json_encode([
            "message" => "Hello world"
        ]);
        $response->getBody()->write($payload);

        $lojaDAO = new LojaDAO();
        $lojaDAO->teste();

        return $response
            ->withHeader('Content-Type', 'application/json');
    }
}