<?php

namespace App\DAO\SlimFramework;

class LojaDAO extends Connect {

    public function __construct()
    {
        parent::__construct();
    }

    public function teste() 
    {
        $lojas = $this->pdo
            ->query('SELECT * FROM loja;')
            ->fetchAll(\PDO::FETCH_ASSOC);
        echo "<pre>";
        foreach($lojas as $loja) {
            var_dump($loja);
        }
        echo "</pre>";
        die;
    }
}