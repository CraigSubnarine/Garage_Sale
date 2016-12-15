<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Slim\App as App;
use \Slim\Container as Container;
use Slim\Views\PhpRenderer as PhpRenderer;
use Slim\Views\Twig as Twig;

require 'vendor/autoload.php';
include "lib.php";

session_start();


$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
    'renderer' => new Twig("./templates")
];
$container = new Container($configuration);
$app = new App($container);




$app->get('/', function (Request $request, Response $response) {//for index main page
  if($_SESSION['id']=-1)//[debug] check where session id is initialized and set if errors occur
    return $this->renderer->render($response, "/login.phtml");
  
  return $this->renderer->render($response, "/home.php");//file in template folder
});

/*
$app->get('/signIn', function (Request $request, Response $response) {//for index main page
  if($_SESSION['id']=-1)//[debug] check where session id is initialized and set if errors occur
    return $this->renderer->render($response, "/login.phtml");
  
  return $this->renderer->render($response, "/home.php");//file in template folder
});
*/

$app->post('/signIn', function (Request $request, Response $response) {//login
  $uName = $_POST['username'];
  $pass = $_POST['password'];
  $a=login($uName, $pass);
  if($a){
    echo '<script>window.location.href = "../templates/home.php";</script>';
 }
  else{
    echo '<script>window.location.href = "../";</script>';
  }

});


$app->post('/reg', function (Request $request, Response $response) {//registration
  $uName = $_POST['username'];
  $pass = $_POST['password'];
  $email = $_POST['email'];
  $contact = intval($_POST['contact']);

  $res = (saveUser($uName, $pass, $email, $contact));
  if($res)
    echo '<script>window.location.href = "../templates/home.php";</script>';
    // return $this->renderer->render($response, "/home.php");//file in template folder
  else
    echo '<script>alert("Registration Error")";</script>';
    // return $this->renderer->render($response, "/login.phtml");
});



$app->get('/logout', function (Request $request, Response $response) {//prints all available items in json format
  $res=logout();//function from lib.php
    //$response = $response->withJson($items);
  return $this->renderer->render($response, "/login.phtml");
  //return $response="hi";
});



$app->get('/items', function (Request $request, Response $response) {//prints all available items in json format
    $items=getAllAvalibleItems();//function from lib.php
    $response = $response->withJson($items);
    return $response;
  });


$app->post('/additem', function (Request $request, Response $response) {//prints all available items in json format
  if($_POST['name']!="" && isset($_POST['price'])){
    $name = $_POST['name'];
    $type = $_POST['type'];
    $desc = $_POST['description'];
    $quantity = intval($_POST['quantity']);
    $price = floatval($_POST['price']);

    $response = saveItem($name, $_SESSION['id'], $price, $type, $desc, $quantity);
  }
  echo '<script>window.location.href = "../templates/home.php";</script>';
  return $response;
  });


$app->get('/user', function (Request $request, Response $response, $args) {//prints user with userid 'id' in json format
    $id = $_SESSION['id'];
    //$id = $args['id'];
    $user=getUser($id);//fuction from lib.php
    $response = $response->withJson($user);
    return $response;
  });

$app->get('/user/{id}', function (Request $request, Response $response, $args) {//prints user with userid 'id' in json format
    $id = $args['id'];
    $user=getUser($id);//fuction from lib.php
    $response = $response->withJson($user);
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


$app->get('/del/{id}', function (Request $request, Response $response, $args) {//prints user items
    $iid = $args['id'];

    $res=deleteItem($id);//fuction from lib.php
    $response = $response->withJson($res);
    return $response;
  });


$app->get('/useritems', function (Request $request, Response $response) {//prints user items
    $id = $_SESSION['id'];
    $items=getAllUserItems($id);//fuction from lib.php
    $response = $response->withJson($items);
    return $response;
  });





$app->get('/usrIntr/{iid}', function (Request $request, Response $response, $args){
  $uid = $_SESSION['id'];
  $item = $args['iid'];

  if($uid!=-1 && $item!=null){
    $res=makeInterest($uid,$item);
    if($res){
      $response = $uid." is interested in ".$item;
    }
    else
      $response = $uid." could not make new interest in ".$item;
  }
  
  echo '<script>window.location.href = "../templates/home.php";</script>';
  return $response;
});


$app->run();
