<?php
require_once 'models/auth.model.php';
require_once 'views/auth.view.php';
require_once 'views/admin.views.php';
class AuthController{
    private $model;
    private $view;
    private $adminView;
    public function __construct(){
        $this->model=new AuthModel();
        $this->view=new AuthView();
        $this->adminView=new AdminView();
    }
    public function showLogin(){
        $this->view->formLogin();
    }
    public function verify(){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $user=$this->model->getUser($username);
        if ($user && password_verify($password, $user->password)){
            if(session_status()!= PHP_SESSION_ACTIVE){
                session_start();
            }
            $_SESSION['IS_LOGGED'] = true;
            $_SESSION['ID_USER'] = $user->id_usuario;
            $_SESSION['USERNAME'] = $user->email;
            header("Location: ".BASE_URL.'showABM');
        }
        else{
            $this->view->formLogin("Los datos son incorrectos");
        }
    }
    public function logout() {
        if(session_status()!= PHP_SESSION_ACTIVE){
            session_start();
        }
        session_destroy();
        header("Location: " . BASE_URL . 'home');
    }
}