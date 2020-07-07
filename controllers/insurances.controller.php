<?php
    require_once 'models/insurances.model.php';
    require_once 'views/insurances.view.php';
    require_once 'views/errors.view.php';

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
            $categories=$this->model->getAllCategory();
            $this->view->showInsurances($categories);
        }
        public function showContacts(){
            $this->view->showContacts();
        }
        public function aboutUs(){
            $this->view->showAboutUs();
        }
        public function showPlans($id){
            $planes=$this->model->getPlans($id);
            if(!empty($planes)){
                $this->view->showPlans($planes);
            }
            else{
                $this->pageNotFound();
            }
        }
        public function showCoverange($id_plan){
            $coverange=$this->model->getPlan($id_plan);
            if($coverange != false){
                $planes=$this->model->getPlans($coverange->id_categoria_fk);
                $this->view->showCoverange($coverange, $planes);
            }
            else{
                $this->pageNotFound();
            }
        }
        public function pageNotFound(){
            $this->viewError->pageNotFound();
        }
}