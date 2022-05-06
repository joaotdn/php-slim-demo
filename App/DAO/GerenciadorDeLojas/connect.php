<?php

namespace App\DAO\GerenciadorDeLojas;

abstract class Connect {
    /**
     * @var \PDO
     */
    protected $pdo;

    public function __construct()
    {
        $host = getenv('MARKET_MANAGEMENT_HOST');
        $dbname = getenv('MARKET_MANAGEMENT_DBNAME');
        $user = getenv('MARKET_MANAGEMENT_USER');
        $pass = getenv('MARKET_MANAGEMENT_PASSWORD');
        $port = getenv('MARKET_MANAGEMENT_PORT');

        $dsn = "mysql:host={$host};dbname={$dbname};port={$port}";

        $this->pdo = new \PDO($dsn, $user, $pass);
        $this->pdo->setAttribute(
            \PDO::ATTR_ERRMODE,
            \PDO::ERRMODE_EXCEPTION
        );
    }

}