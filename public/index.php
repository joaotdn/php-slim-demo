<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require_once "../vendor/autoload.php";

$app = new \Slim\App();

$app->get('/produtos[/nome]', function(Request $request, Response $response, array $args) {
    // Caso o limite seja nulo, o valor padrão será 10
    $limit = $request->getQueryParams()['limit'] ?? 10;
    $nome = $args['nome'] ?? 'mouse';
    return $response->getBody()
        ->write("{$limit} produtos do banco de dados com o nome {$nome}");
});

$app->run();