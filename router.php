<?php
    require_once 'controllers/insurances.controller.php';
    require_once 'controllers/admin.controller.php';
    require_once 'controllers/auth.controller.php';

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
        case 'contacts':
            $controller= new InsurancesController();
            $controller->showContacts();
        break;
        case 'aboutUs':
            $controller= new InsurancesController();
            $controller->aboutUs();
        break;
        case'admin':
            $controller= new AuthController();
            $controller->showLogin();
        break;
        case 'verify':
            $controller=new AuthController();
            $controller->verify();
        break;
        case 'logout':
            $controller=new AuthController();
            $controller->logout();
        break;    
        case'showABM':
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
        break;
        case 'showDeletePlan':
            $controller= new AdminController();
            $controller->showDeletePlan();  
        break;
        case 'deletePlan':
            $controller= new AdminController();
            $controller->deletePlan($parametros[1]);
        break;
        case'showEditCategory':
            $controller=new AdminController();
            $controller->showEditCategory();
        break;
        case'editCategory':
            $controller=new AdminController();
            $controller->editCategory($parametros[1]);
        break;
        case'saveEditCategory':
            $controller=new AdminController();
            $controller->saveEditCategory();
        break;
        case'showEditPlans':
            $controller=new AdminController();
            $controller->showEditPlans();
        break;
        case'editPlan':
            $controller=new AdminController();
            $controller->editPlan($parametros[1]);
        break;
        case'saveEditPlan':
            $controller=new AdminController();
            $controller->saveEditPlan();
        break;
        default:
        $controller= new InsurancesController();
        $controller->pageNotFound();
        break;
    }