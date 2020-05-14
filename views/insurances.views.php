<?php
    require_once ('libs/Smarty.class.php');  
    class InsurancesView{

        public function showInsurances($insurances){
            $smarty= new Smarty();
            $smarty->assign('base_url', BASE_URL);
            $smarty->assign('title','Seguros Marcin');
            $smarty->assign('insurances', $insurances);
            $smarty->display('insurances.tpl');
        }
        public function showPlans($plans){
            $smarty= new Smarty();
            $smarty->assign('base_url', BASE_URL);
            $smarty->assign('title','Seguros Marcin');
            $smarty->assign('plans', $plans);
            $smarty->display('plans.tpl');
        }
        public function showCoverange($coveranges){
            $smarty= new Smarty();
            $smarty->assign('base_url', BASE_URL);
            $smarty->assign('title','Seguros Marcin');
            $smarty->assign('coveranges', $coveranges);
            $smarty->display('coveranges.tpl');
        }
        public function formAdd($categorias){
            $smarty= new Smarty();
            $smarty->assign('base_url', BASE_URL);
            $smarty->assign('title','Seguros Marcin');
            $smarty->assign('categorias',$categorias);
            $smarty->display('formAdd.tpl');

        }
        public function showAllPlans($plans){
            $smarty= new Smarty();
            $smarty->assign('base_url', BASE_URL);
            $smarty->assign('title','Seguros Marcin');
            $smarty->assign('plans', $plans);
            $smarty->display('deletePlans.tpl');
        }

}