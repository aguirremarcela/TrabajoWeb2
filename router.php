<?php
    require_once 'controllers/insurances.controller.php';


    // definimos la base url de forma dinamica
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    // define una acción por defecto
    if (empty($_GET['action'])) {
        $_GET['action'] = 'home';
    } 

    // toma la acción que viene del usuario y parsea los parámetros
    $accion = $_GET['action']; 
    $parametros = explode('/', $accion);
    //var_dump($parametros[0]); die; // like console.log();

    // decide que camino tomar según TABLA DE RUTEO
    switch ($parametros[0]) {
        case 'home': 
            $controller= new InsurancesController();
            $controller->showInsurances();
        break;
        case 'seePlansCategory':
            $controller= new InsurancesController();
            $controller->showPlans($parametros[1]);
        break;
    }