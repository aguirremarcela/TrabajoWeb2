<?php
require_once ('libs/Smarty.class.php');
class adminView{
    private $smarty;
    public function __construct(){
        $this->smarty = new Smarty();
        $this->smarty->assign('base_url', BASE_URL);
        $this->smarty->assign('title','Seguros Marcin');
    }
    public function showABM(){
        $this->smarty->display('optionsAdmin.tpl');
    }
    public function formAddCategory(){
        $this->smarty->display('formAddCategory.tpl');
    }
    public function showAddPlan($categorias){
        $this->smarty->assign("categorias", $categorias);
        $this->smarty->display('formAddplan.tpl');
    }
}