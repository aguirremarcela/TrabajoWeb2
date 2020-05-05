<?php
require_once 'models/insurances.model.php';
require_once 'views/insurances.views.php';

class InsurancesController{

    private $model;
    private $view;
    public function __construct(){
        $this->model=new InsurancesModel();
        $this->view=new InsurancesView();

    }
    public function showInsurances(){
        $categorias=$this->model->getCategory();
            
        $this->view->showInsurances($categorias);
    }
}