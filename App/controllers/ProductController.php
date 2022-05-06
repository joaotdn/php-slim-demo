<?php

namespace App\controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class ProductController {
    public function getProducts(Request $request, Response $response, array $args): Response {
        /**
         * Slim 3
         * $reponse = $response->withJson(array);
         */
        $payload = json_encode([
            "message" => "Hello world"
        ]);
        $response->getBody()->write($payload);

        return $response
            ->withHeader('Content-Type', 'application/json');
    }
}