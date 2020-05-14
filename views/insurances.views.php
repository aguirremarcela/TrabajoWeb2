<?php
    require_once ('libs/Smarty.class.php');  
    class InsurancesView{
        private $smarty;
        public function __construct(){
            $this->smarty = new Smarty();
            $this->smarty->assign('base_url', BASE_URL);
            $this->smarty->assign('title','Seguros Marcin');
        }
        public function showInsurances($insurances){
            $this->smarty->assign('insurances', $insurances);
            $this->smarty->display('insurances.tpl');
        }
        public function showPlans($plans){
            $this->smarty->assign('plans', $plans);
            $this->smarty->display('plans.tpl');
        }
        public function showCoverange($coveranges){
            $this->smarty->assign('coveranges', $coveranges);
            $this->smarty->display('coveranges.tpl');
        }
        public function showAllPlans($plans){
            $this->smarty->assign('plans', $plans);
            $this->smarty->display('deletePlans.tpl');
        }
}