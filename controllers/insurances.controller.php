<?php
    require_once 'models/insurances.model.php';
    require_once 'views/insurances.views.php';
    require_once 'views/errors.views.php';

    class InsurancesController{
        private $model;
        private $view;
        private $viewError;
        public function __construct(){
            $this->model=new InsurancesModel();
            $this->view=new InsurancesView();
            $this->viewError=new ErrorsView();
        }
        public function showInsurances(){
            $categorias=$this->model->getAllCategory();
            $this->view->showInsurances($categorias);
        }
        public function showPlans($id){
            $planes=$this->model->getPlans($id);
            $this->view->showPlans($planes);
        }
        public function showCoverange($id_plan){
            $coverange=$this->model->getPlan($id_plan);
            $planes=$this->model->getPlans($coverange->id_categoria_fk);
            $this->view->showCoverange($coverange, $planes);
        }
        public function pageNotFound(){
            $this->viewError->pageNotFound();
        }
}