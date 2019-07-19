<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use Illuminate\Http\Request;



$router->get('/', function () use ($router) {
    $turmas=app('db')->select("SELECT * FROM class");
    return $turmas;
});

$router->get('/{id:[0-9]+}', function ($id) use ($router) {
    $turma=app('db')->select("SELECT * FROM class WHERE id=?",[$id]);
    return $turma;
});

$router->post('/', function (Request $request) use ($router) {
    $turma=$request->json();
    app('db')->insert("INSERT INTO class(date_begin,date_end,course_id) VALUES (:date_begin,:date_end,:course_id)",$turma->all());
    $pdo = app('db')->getPdo();
    $id=$pdo->lastInsertId('class_id_seq');
    return $id;
});


$router->put('/', function (Request $request) use ($router) {
    $turma=$request->json();
    $affected=app('db')->update("UPDATE class SET date_begin=:date_begin , date_end=:date_end, course_id=:course_id WHERE id=:id",$turma->all());
    
    if($affected==0){
        return false;
    }
    
    return $turma->all();
});

$router->delete('/{id:[0-9]+}', function ($id) use ($router) {
    $turma=app('db')->select("DELETE FROM class WHERE id=?",[$id]);
    return $turma;
});

$router->get('/teste', function () use ($router) {

});