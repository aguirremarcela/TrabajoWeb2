<?php

class AuthView{
    private $smarty;
    public function __construct(){
        $this->smarty = new Smarty();
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('title','Seguros Marcin');
    }
    public function formLogin($error=null){
        $this->smarty->assign('error',$error);
        $this->smarty->display('formLogin.tpl');
    }

}