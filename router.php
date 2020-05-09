<?php
    require_once 'controllers/insurances.controller.php';

    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    if (empty($_GET['action'])) {
        $_GET['action'] = 'home';
    } 

    $accion = $_GET['action']; 
    $parametros = explode('/', $accion);

    switch ($parametros[0]) {
        case 'home': 
            $controller= new InsurancesController();
            $controller->showInsurances();
        break;
        case 'seePlansCategory':
            $controller= new InsurancesController();
            $controller->showPlans($parametros[1]);
        break;
        case 'showCoverage':
            $controller= new InsurancesController();
            $controller->showCoverange($parametros[1]);
        break;
        
    }