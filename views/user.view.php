<?php

class UserView{
    private $smarty;
    public function __construct(){
        $this->smarty = new Smarty();
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('title','Seguros Marcin');
        if(session_status()!= PHP_SESSION_ACTIVE){
            session_start();
        }
        if(isset($_SESSION['IS_LOGGED'])){
            $this->smarty->assign('isLogged',$_SESSION['IS_LOGGED']);
            $this->smarty->assign('user',$_SESSION['USERNAME']);
            $this->smarty->assign('administrador',$_SESSION['ROLE']);
        } 
    }
    public function formLogin($error=null){
        $this->smarty->assign('error',$error);
        $this->smarty->display('formLogin.tpl');
    }
    public function formRegister($error=null){
        $this->smarty->assign('error',$error);
        $this->smarty->display('formRegister.tpl');
    }
}