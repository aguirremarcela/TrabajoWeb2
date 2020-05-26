<?php
require_once ('libs/Smarty.class.php');
class adminView{
    private $smarty;
    public function __construct(){
        $this->smarty = new Smarty();
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('title','Seguros Marcin');
    }
    public function formLogin(){
        $this->smarty->display('formLogin.tpl');
    }
    public function showABM(){
        $this->smarty->display('optionsAdmin.tpl');
    }
    public function formAddCategory($categories){
        $this->smarty->assign('categories', $categories);
        $this->smarty->display('formAddCategory.tpl');
    }
    public function showAddPlan($categories, $plans){
        $this->smarty->assign("categories", $categories);
        $this->smarty->assign("plans", $plans);
        $this->smarty->display('formAddplan.tpl');
    }
    public function showAllPlans($plans){
        $this->smarty->assign('plans', $plans);
        $this->smarty->display('deletePlans.tpl');
    }
    public function showAllCategories($categories){
        $this->smarty->assign('categories', $categories);
        $this->smarty->display('deleteCategories.tpl');
    }
    public function showEditCategory($categories){
        $this->smarty->assign("categories", $categories);
        $this->smarty->display('formEditCategory.tpl');
    }
    public function editCategory($category){
        $this->smarty->assign('category',$category);
        $this->smarty->display('editCategory.tpl');
    }
    public function showEditPlans($plans){
        $this->smarty->assign("plans", $plans);
        $this->smarty->display('formEditPlans.tpl');
    }
    public function editPlan($plan){
        $this->smarty->assign('plan',$plan);
        $this->smarty->display('editPlan.tpl');
    }
}