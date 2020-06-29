<?php
    require_once ('libs/smarty/Smarty.class.php');  
    class InsurancesView{
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
        public function showInsurances($insurances){
            $this->smarty->assign('insurances', $insurances);
            $this->smarty->display('insurances.tpl');
        }
        public function showContacts(){
            $this->smarty->display('contacts.tpl');
        }
        public function showAboutUs(){
            $this->smarty->display('aboutUs.tpl');
        }
        public function showPlans($plans){
            $this->smarty->assign('plans', $plans);
            $this->smarty->display('plans.tpl');
        }
        public function showCoverange($coveranges,$planes){
            $this->smarty->assign('coveranges', $coveranges);
            $this->smarty->assign('plans',$planes);
            $this->smarty->display('coveranges.tpl');
        }
}