<?php

namespace App\DAO\GerenciadorDeLojas;

use App\models\GerenciadorDeLojas\LojaModel;

class UsuarioLojaDAO extends Connect {

    public function __construct()
    {
        parent::__construct();
    }
    
    // TODO concluir usuariodao
    public function getUserByEmail(string $email): array {
        $this->pdo
             ->prepare('SELECT id, nome, email, senha FROM usuarios');
        
        return [];
    }
}