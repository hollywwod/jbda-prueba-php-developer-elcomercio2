<?php
//use \Psr\Http\Message\ServerRequestInterface as Request;
//use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

//\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim();
$app->get('/', function () use($app) {
    $name="hola";
    $app->render('index.php',compact('name'));


});


$app->get('/problema1', function () use($app){
    $name="hola";
    $app->render('ChangeString.php',compact('name'));
})->via(['GET','POST']);

$app->get('/problema2', function () use($app){
    $name="hola";
    $app->render('CompleteRange.php',compact('name'));
})->via(['GET','POST']);

$app->get('/problema3', function () use($app){
    $name="hola";
    $app->render('ClearPar.php',compact('name'));
})->via(['GET','POST']);

$app->get('/listar_empleado', function () use($app){
    $name="hola";
    $app->render('listar_empleado.php',compact('name'));
})->via(['GET','POST']);

$app->get('/detalle_empleado/:id', function ($id) use($app){
    $name="hola";

    $app->render('detalle_empleado.php',compact('id'));
})->via(['GET','POST']);

$app->get('/filtrar_empleado', function () use($app){
    $name="hola";
    $app->render('buscar_x_salario.php',compact('name'));
})->via(['GET','POST']);








$app->get('/buscar_empleado', function () use($app){
    $name="hola";
    $app->render('buscar_empleado.php',compact('name'));
})->via(['GET','POST']);

$app->get('/buscar_empleado_salario', function () use($app){
    $name="hola";
    $app->render('buscar_empleado_salario.php',compact('name'));
})->via(['GET','POST']);


$app->get('/exportarxml', function () use($app){
    $name="hola";
    $app->render('exportarxml.php',compact('name'));
})->via(['GET','POST']);


$app->run();
