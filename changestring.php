<?php
//use \Psr\Http\Message\ServerRequestInterface as Request;
//use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

//\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();

$app->get('/problema1', function () use($app) {
    $name="hola";
    $app->render('index.php',compact('name'));


});
$app->run();