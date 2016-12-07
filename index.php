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
  if($_SESSION['id']=-1)//[debug] check where session id is initialized and set if errors occur
    return $this->renderer->render($response, "/login.phtml");
  
  return $this->renderer->render($response, "/home.php");//file in template folder
});

$app->get('/signIn', function (Request $request, Response $response) {//for index main page
  if($_SESSION['id']=-1)//[debug] check where session id is initialized and set if errors occur
    return $this->renderer->render($response, "/login.phtml");
  
  return $this->renderer->render($response, "/home.php");//file in template folder
});


// $app->post('signIn.php', function (Request $request, Response $response) {//login

//   //$post = $request->getParsedBody();
//   $uName = $_POST['username'];
//   $pass = $_POST['password'];

//   $res = login($uName, $pass);
//   /*
//   if($res)
//     return $this->renderer->render($response, "/home.php");//file in template folder
//   else
//     return $this->renderer->render($response, "../");
//     //return false;
//   */
//   return $res;
// });


$app->post('/reg', function (Request $request, Response $response) {//registration

  //$post = $request->getParsedBody();
  $uName = $_POST['username'];
  $pass = $_POST['password'];
  $email = $_POST['email'];
  $contact = intval($_POST['contact']);

  $res = saveUser($uName, $pass, $email, $contact);
  if($res)
    return $this->renderer->render($response, "/home.php");//file in template folder
  else
    return $this->renderer->render($response, "/login.phtml");
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



$app->get('/user', function (Request $request, Response $response, $args) {//prints user with userid 'id' in json format
    $id = $_SESSION['id'];
    //$id = $args['id'];
    $items=getUser($id);//fuction from lib.php
    $response = $response->withJson($items);
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

$app->get('/usrIntr/{uid}/{iid}', function (Request $request, Response $response, $args){
  $uid=$args['uid'];
  $item=$args['iid'];

  if($uid!=null && $item!=null){
    $res=makeInterest($uid,$item);
    if($res){
      $response=$uid." is interested in ".$item;
    }
    else
      $response=$uid." could not make new interest in ".$item;
  }

  return $response;
});


$app->run();
