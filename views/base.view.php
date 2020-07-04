<?php
require_once ('libs/smarty/Smarty.class.php');
class BaseView {
    private $smarty;
    public function baseView(){
        $this->smarty = new Smarty();
        $this->smarty->assign('base_url', BASE_URL);
        if(session_status()!= PHP_SESSION_ACTIVE){
            session_start();
        }
        if(isset($_SESSION['IS_LOGGED'])){
            $this->smarty->assign('user',$_SESSION['USERNAME']);
            $this->smarty->assign('userId',$_SESSION['ID_USER']);
            $this->smarty->assign('administrator',$_SESSION['ROLE']);  
        }       
        return $this->smarty;
    }
}