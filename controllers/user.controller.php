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
    public function verify($email = null, $password = null){
        if(!empty($_POST)){
            $email=$_POST['email'];
            $password=$_POST['password'];
        }
        $user=$this->model->get($email);
        if ($user && password_verify($password, $user->password)){
            if(session_status()!= PHP_SESSION_ACTIVE){
                session_start();
            }
            $_SESSION['IS_LOGGED'] = true;
            $_SESSION['ID_USER'] = $user->id_usuario;
            $_SESSION['EMAIL'] = $user->email;
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
        $email=$_POST['email'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $password2=$_POST['password2'];
        $user=$this->model->get($email,$username);
        if(!empty($email) && !empty($username) && $password==$password2 && empty( $user)){
            $Encryted=password_hash($password,PASSWORD_DEFAULT);
            $this->model->insert($email,$username,$Encryted);
            $this->verify($username, $password);
        }
        else if(empty($email) || empty($username) || empty($password) || empty($password2)){
            $this->view->formRegister("Todos los campos deben estar completos");
        }
        else if($password != $password2){
            $this->view->formRegister("Las contraseñas ingresadas no coinciden");
        }
        else if($user->email == $email){
            $this->view->formRegister("La direccion de email ya se encuetra registrada");
        }
        else if($user->usuario == $username){
            $this->view->formRegister("El nombre de usuario ya existe");
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