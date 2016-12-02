<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Slim\App as App;
use \Slim\Container as Container;
use Slim\Views\PhpRenderer as PhpRenderer;
use Slim\Views\Twig as Twig;

require 'vendor/autoload.php';
include "lib.php";






$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
    'renderer' => new Twig("./templates")
];
$container = new Container($configuration);
$app = new App($container);





$app->get('/', function (Request $request, Response $response) {//for index main page
  return $this->renderer->render($response, "/index.phtml");//file in template folder
});


$app->get('/hello', function (Request $request, Response $response) {//no real purpose
/*
  include_once('MyView.php');

  $t = new MyView();

  $t->friends = array(
    'Rachel', 'Monica', 'Phoebe', 'Chandler', 'Joey', 'Ross'
  );

  $t->render('hello.phtml');
*/
  return $this->renderer->render($response, "/hello.phtml");//file in template folder
});


$app->get('/items', function (Request $request, Response $response) {//prints all available items in json format
    $items=getAllAvalibleItems();//function from lib.php
    $response = $response->withJson($items);
    return $response;
  });


$app->get('/user/{id}', function (Request $request, Response $response, $args) {//prints user with userid 'id' in json format
    $id = $args['id'];
    $items=getUser($id);//fuction from lib.php
    $response = $response->withJson($items);
    return $response;
  });


$app->get('/items/{id}', function (Request $request, Response $response, $args) {//prints item with itemid 'id' in json format
    $id = $args['id'];
    $item=getItem($id);//fuction from lib.php
    if($item!=null)
      $response = $response->withJson($item);
    else
      $response = $response->withStatus(404);

    return $response;
  });



$app->run();
