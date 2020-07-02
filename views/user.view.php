<?php
    require_once ('views/base.view.php');
class UserView extends BaseView{
    private $smarty;
    public function __construct(){
        $this->smarty = $this->baseView();
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