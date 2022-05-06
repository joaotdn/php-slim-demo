<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require_once "../vendor/autoload.php";

$md01 = function(Request $request, Response $response, $next) : Response {
    $response->getBody()->write("EXEC md1<br>");
    $response = $next($request, $response);
    $response->getBody()->write("<br>EXEC md2");

    return $response;
};

$configuration = [
    'settings' => [
        'displayErrorDetails' => true
    ],
];
$configuration = new \Slim\Container($configuration);

$app = new \Slim\App($configuration);

$app->get('/produto[/nome]', function(Request $request, Response $response, array $args) {
    // Caso o limite seja nulo, o valor padrão será 10
    $limit = $request->getQueryParams()['limit'] ?? 10;
    $nome = $args['nome'] ?? 'mouse';

    return $response->getBody()
        ->write("{$limit} produtos do banco de dados com o nome {$nome}");
})->add($md01);

$app->post('/produto', function(Request $request, Response $response, array $args) {
    $data = $request->getParsedBody();
    $nome = $data['nome'] ?? '';
    return $response->getBody()->write("Produto {$nome}");
});

$app->run();