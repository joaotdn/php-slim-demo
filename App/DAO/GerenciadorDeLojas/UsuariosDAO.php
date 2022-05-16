<?php

namespace App\DAO\GerenciadorDeLojas;

use App\models\GerenciadorDeLojas\UsuarioModel;

class UsuariosDAO extends Connect {

    public function __construct()
    {
        parent::__construct();
    }
    
    // TODO concluir usuariodao
    public function getUserByEmail(string $email): ?UsuarioModel {
        $statement = $this->pdo
             ->prepare('SELECT * FROM usuarios
                WHERE email = :email');
        $statement->bindParam('email', $email);
        $statement->execute();
        $users = $statement->fetchAll(\PDO::FETCH_ASSOC);
        if (count($users) === 0) {
            return null;
        }
        $user = new UsuarioModel();
        $user->setId($users[0]['id'])
             ->setNome($users[0]['nome'])
             ->setEmail($users[0]['email'])
             ->setSenha($users[0]['senha']);
        return $user;
    }
}