<?php
require_once 'models/user.model.php';
require_once 'views/user.view.php';
class UserController{
    private $model;
    private $view;
    public function __construct(){
        $this->model=new UserModel();
        $this->view=new UserView();
    }
    public function showLogin(){
        if(session_status()!= PHP_SESSION_ACTIVE){
            session_start();
        }
            if(isset($_SESSION['IS_LOGGED'])){
                header("Location: ".BASE_URL.'showABM');
            }
            else{
                $this->view->formLogin();
            }
    }
    public function verify($username = null, $password = null){
        if(!empty($_POST)){
            $username=$_POST['username'];
            $password=$_POST['password'];
        }
        $user=$this->model->get($username);
        if ($user && password_verify($password, $user->password)){
            if(session_status()!= PHP_SESSION_ACTIVE){
                session_start();
            }
            $_SESSION['IS_LOGGED'] = true;
            $_SESSION['ID_USER'] = $user->id_usuario;
            $_SESSION['USERNAME'] = $user->email;
            $_SESSION['ROLE'] = $user->administrador;
            $this->role($user);
        }
        else{
            $this->view->formLogin("Los datos son incorrectos");
        }
    }
    private function role($user){
        if($user->administrador == 1){
            header("Location: " . BASE_URL . 'showABM');
        }
        else{
            header("Location: " . BASE_URL . 'home');
        }
    }
    public function showRegister(){
        $this->view->formRegister();
    }
    public function signUp(){
        $username=$_POST['username'];
        $password=$_POST['password'];
        $password2=$_POST['password2'];
        $user=$this->model->get($username);
        if(!empty($username) && $password==$password2 && empty( $user)){
            $Encryted=password_hash($password,PASSWORD_DEFAULT);
            $this->model->insert($username,$Encryted);
            $this->verify($username, $password);
        }
        else{
            $this->view->formRegister("El usario ya existe o las contraseñas no coinciden");
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