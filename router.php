<?php
    require_once 'controllers/insurances.controller.php';
    require_once 'controllers/admin.controller.php';

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
        case'admin':
            $controller= new AdminController();
            $controller->showForm();
        break;
        case 'insertCategory':
            $controller= new AdminController();
            $controller->addCategory(); 
        break;
        case'insertPlan':
            $controller= new AdminController();
            $controller->addPlan();    
        break;
        case'deletePlan':
            $controller= new AdminController();
            $controller->deletePlan(); 
        break;    
    }