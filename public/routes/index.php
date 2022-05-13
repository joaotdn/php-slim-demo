<?php

use function src\{
    slimConfiguration,
    basicAuth
};

use App\controllers\LojaController;
use App\controllers\ProdutoController;

$app = new \Slim\App(slimConfiguration());

// ==============================================

$app->group('', function() use ($app) {
    $app->get('/loja', LojaController::class . ':getLojas');
    $app->post('/loja', LojaController::class . ':insertLoja');
    $app->put('/loja', LojaController::class . ':updateLoja');
    $app->delete('/loja', LojaController::class . ':deleteLoja');
    
    $app->get('/produto', ProdutoController::class . ':getProdutos');
    $app->post('/produto', ProdutoController::class . ':insertProduto');
    $app->put('/produto', ProdutoController::class . ':updateProduto');
    $app->delete('/produto', ProdutoController::class . ':deleteProduto');
})->add(basicAuth());

// ==============================================

$app->run();