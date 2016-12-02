<?php
	require 'vendor/autoload.php';
	include 'lib.php';

	use \Psr\Http\Message\ServerRequestInterface as Request;
	use \Psr\Http\Message\ResponseInterface as Response;
	use \Slim\App as App;
	use \Slim\Container as Container;
	use Slim\Views\PhpRenderer as PhpRenderer;
	use Slim\Views\Twig as Twig;

/*
	$configuration = [
		'settings' => [
				'displayErrorDetails' => true,
		],
		'renderer' => new Twig("./templates")
	];
	
	$container = new Container($configuration);

	$app = new App($container);
*/
	$container = new \Slim\Container;
	$app = new \Slim\App($container);

	//$app = new \Slim\App;


	/*
	$app->get('/sect/{name}', function (Request $request, Response $response) {
		return $this->renderer->render($response, "/index.phtml");
	});
*/
	$app->get('/hello/{name}', function ($request, Response $response, $args) {
    //$name = $request->getAttribute('name');
	$name = $args['name'];
    $response->getBody()->write("Welcome to Garage Sale, $name");

    return $response;
	});

	$app->run();