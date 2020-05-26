<?php
require_once 'models/auth.model.php';
require_once 'views/auth.view.php';
class AuthController{
    private $model;
    private $view;
    public function __construct(){
        $this->model=new AuthModel();
        $this->view=new AuthView();
    }
    public function showLogin(){
        
    }
    public function verify(){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $user=$this->model->getUser($username);
        if ($user && password_verify($password, $user->password)){
            header("Location: ".BASE_URL.'showABM');
        }
        else{
            $this->view->formLogin("Los datos son incorrectos");
        }
    }
}