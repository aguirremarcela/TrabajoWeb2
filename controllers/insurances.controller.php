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
            $categorias=$this->model->getAllCategory();
            $this->view->showInsurances($categorias);
        }
        public function showPlans($id){
            $planes=$this->model->getPlans($id);
            $this->view->showPlans($planes);
        }
        public function showCoverange($id_plan, $id_categoria){
            $coverange=$this->model->getPlan($id_plan);
            $planes=$this->model->getPlans($id_categoria);
            $this->view->showCoverange($coverange, $planes);
        }
}