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

    //Chequea si una sesion esta activa, de lo contrario muestra el formulario login. 
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

    //Verifica que el email y password ingresados sean correctos.
    public function verify($email = null, $password = null){
        /*Si los datos no vienen por POST es porque llegaron de formulario de 
        registro y loquea al usuario.*/
        if(!empty($_POST)){
            $email=$_POST['email'];
            $password=$_POST['password'];
        }
        $user=$this->model->get($email);

        /*Comprueba que el usuario exista y que la contraseña sea igual a la db
           y en ese caso lo loguea.*/
        if ($user && password_verify($password, $user->password)){
            $this->login($user);
        }
        else{
            $this->view->formLogin("Los datos son incorrectos");
        }
    }

    //Muestra el formulario para registrarse.
    public function showRegister(){
        $this->view->formRegister();
    }

    //Recoge los datos de formulario, comprueba que los datos sean correctos y lo registra.
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

    //Cierra una sesion.
    public function logout() {
        if(session_status()!= PHP_SESSION_ACTIVE){
            session_start();
        }
        session_destroy();
        header("Location: " . BASE_URL . 'home');
    }

    //Inicia y setea los datos en la sesion.
    public function login($user) {
        if(session_status()!= PHP_SESSION_ACTIVE){
            session_start();
        }
        $_SESSION['IS_LOGGED'] = true;
        $_SESSION['ID_USER'] = $user->id_usuario;
        $_SESSION['EMAIL'] = $user->email;
        $_SESSION['ROLE'] = $user->administrador;
        header("Location: " . BASE_URL . 'home');
    }
}