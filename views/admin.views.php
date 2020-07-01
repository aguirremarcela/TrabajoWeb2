<?php
require_once ('libs/smarty/Smarty.class.php');
class AdminView{
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
        $this->smarty->display('BMPlans.tpl');
    }
    public function showAllCategories($categories){
        $this->smarty->assign('categories', $categories);
        $this->smarty->display('BMCategories.tpl');
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
    public function showAllUsers($users){
        $this->smarty->assign('users',$users);
        $this->smarty->display('showUsers.tpl');
    }
}