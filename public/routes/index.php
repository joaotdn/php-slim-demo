<?php

use function src\slimConfiguration;

use App\controllers\LojaController;
use App\controllers\ProdutoController;

$app = new \Slim\App(slimConfiguration());

// ==============================================

$app->get('/loja', LojaController::class . ':getLojas');
$app->post('/loja', LojaController::class . ':insertLoja');
$app->put('/loja', LojaController::class . ':updateLoja');
$app->delete('/loja', LojaController::class . ':deletetLoja');

$app->get('/produto', ProdutoController::class . ':getProdutos');
$app->post('/produto', ProdutoController::class . ':insertProduto');
$app->put('/produto', ProdutoController::class . ':updateProduto');
$app->delete('/produto', ProdutoController::class . ':deletetProduto');

// ==============================================

$app->run();