<?php
 require_once 'models/insurances.model.php';
 require_once 'views/admin.views.php';
 
 class AdminController{
    private $model;
    private $view;
    public function __construct(){
        $this->model=new InsurancesModel();
        $this->view=new adminView();
    }
    public function showABM(){
        $this->view->showABM();
    }
    public function showAddCategory(){
        $this->view->formAddCategory();
    }
    public function addCategory(){
        $categoria=$_POST['categoria'];
        if(!empty($categoria)){ 
            $this->model->insertCategory($categoria);
        }
        else{
            echo'<p>no se puede ingresar campo vacio</p>';
        }
    }
    public function showAddplan(){
        $categorias=$this->model->getCategory();
        $this->view->showAddplan($categorias);                                    
    }
    public function addPlan(){
        $plan = $_POST['plan'];
        $cobertura=$_POST['cobertura'];
        $descripcion=$_POST['descripcion'];
        $id_categoria=$_POST['id_categoria_fk'];
        if(!empty($plan)&& !empty($cobertura) && !empty($id_categoria) ){
            $this->model->insertPlan($plan,$cobertura,$descripcion,$id_categoria);
            //analizar donde se van a mostar esa categoria agregada
        }
        else{
            echo"<p>no se puede insertar un</p>";
        }
    }
    /*
    public function deletePlan(){
        $plans=$this->model->getAllPlans();
        $this->view->showAllPlans($plans);

    }*/
 }