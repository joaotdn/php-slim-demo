<?php

namespace App\controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class AuthController {
    public function getLojas(Request $request, Response $response, array $args): Response {
        $data = $request->getParsedBody();

        return $response;
    }
}