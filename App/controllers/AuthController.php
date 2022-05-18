<?php

namespace App\controllers;

use App\DAO\GerenciadorDeLojas\UsuariosDAO;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Firebase\JWT\JWT;

final class AuthController {
    
    public function login(Request $request, Response $response, array $args): Response {
        $data = $request->getParsedBody();

        $email = $data['email'];
        $senha = $data['senha'];

        $userDAO = new UsuariosDAO();
        $user = $userDAO->getUserByEmail($email);

        if(!password_verify($senha, $user->getSenha()) || is_null($user)) {
            return $response->withStatus(401);
        }

        $tokenPayload = [
            'sub' => $user->getId(),
            'name' => $user->getNome(),
            'email' => $user->getEmail(),
            'expired_at' => (new \DateTime())->modify('+2 days')
                            ->format('Y-m-d H:i:s')
        ];
        $token = JWT::encode($tokenPayload, getenv('JWT_SECRET'));
        $refreshTokenPayload = ['email' => $user->getEmail()];
        $refreshToken = JWT::encode($refreshTokenPayload, getenv('JWT_SECRET'));

        return $response;
    }

}