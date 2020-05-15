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
            $controller->showABM();
        break;
        case 'showAddCategory':
            $controller= new AdminController();
            $controller->showAddCategory();
        break;
        case 'insertCategory':
            $controller= new AdminController();
            $controller->addCategory(); 
        break;
        case 'showAddPlan':
            $controller= new AdminController();
            $controller->showAddplan();
        break;
        case'insertPlan':
            $controller= new AdminController();
            $controller->addPlan();    
        break;
        case 'showDeleteCategory':
            $controller= new AdminController();
            $controller->showDeleteCategory();
        break;
        case 'deleteCategory':
            $controller= new AdminController();
            $controller->deleteCategory($parametros[1]);
        default:
        case 'showDeletePlan':
            $controller= new AdminController();
            $controller->showDeletePlan();  
        break;
        case 'deletePlan':
            $controller= new AdminController();
            $controller->deletePlan($parametros[1]);
        break;
            echo "404 NOT FOUND";
        break;
    }