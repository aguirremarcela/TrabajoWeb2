<?php
require_once 'libs/router/Router.php';
require_once 'api/comments.controller.php';
//creo el ruteador usando la libreria externa
$router = new Router();

// creo la tabla de ruteo
$router->addRoute('planes/:ID/comments', 'GET', 'CommentsController', 'getComments');

// rutea
$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);

