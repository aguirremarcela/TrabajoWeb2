<?php
 require_once 'models/insurances.model.php';
 require_once 'views/admin.views.php';
 
 class AdminController{
    private $model;
    private $view;
    public function __construct(){
        $this->model=new InsurancesModel();
        $this->view=new AdminView();
        $this->checkLogged();
    }
    public function showABM(){
        $this->view->showABM();
    }
    public function showAddCategory(){
        $categories=$this->model->getAllCategory();
        $this->view->formAddCategory($categories);
    }
    public function addCategory(){
        $categoria=$_POST['categoria'];
        $imagen=$_POST['imagen'];
        if(!empty($categoria)){ 
            $this->model->insertCategory($categoria,$imagen);
            header('location:'.BASE_URL.'showAddCategory');
        }
        else{
            echo'<p>no se puede ingresar campo vacio</p>';
        }
    }
    public function showAddplan(){
        $categories=$this->model->getAllCategory();
        $plans=$this->model->getAllPlans();
        $this->view->showAddplan($categories, $plans);                                    
    }
    public function addPlan(){
        $plan = $_POST['plan'];
        $cobertura=$_POST['cobertura'];
        $descripcion=$_POST['descripcion'];
        $id_categoria=$_POST['id_categoria_fk'];
        if(!empty($plan)&& !empty($cobertura) && !empty($id_categoria) ){
            $this->model->insertPlan($plan,$cobertura,$descripcion,$id_categoria);
            header('location:'.BASE_URL.'showAddPlan');
        }
        else{
            echo"<p>no se puede insertar un</p>";
        }
    }
    public function showDeleteCategory(){
        $categories=$this->model->getAllCategory();
        $this->view->showAllCategories($categories);
    }
    public function deleteCategory($id){
        $this->model->deleteCategory($id);
        header('location:'.BASE_URL.'showDeleteCategory');
    }
    public function showDeletePlan(){
        $plans=$this->model->getAllPlans();
        $this->view->showAllPlans($plans);
    }
    public function deletePlan($id){
        $this->model->deletePlan($id);
        header('location:'.BASE_URL.'showDeletePlan');
    }
    public function showEditCategory(){
        $categories=$this->model->getAllCategory();
        $this->view->showEditCategory($categories);
    }
    public function editCategory($id){
        $category=$this->model->getCategory($id);
        $this->view->editCategory($category);
    }
    public function saveEditCategory(){
        $category = $_POST['categoria'];
        $id_category=$_POST['id_categoria'];
        $imagen=$_POST['imagen'];
        if(!empty($category) && !empty($id_category)){
            $this->model->saveEditCategory($category,$imagen,$id_category);
            header('location:'.BASE_URL.'showEditCategory');
        }
        else{
            echo"<p>No se puede editar</p>";
        }
    }
    public function showEditPlans(){
        $plans=$this->model->getAllPlans();
        $this->view->showEditPlans($plans);
    }
    public function editPlan($id){
        $plan=$this->model->getPlan($id);
        $this->view->editPlan($plan);
    }
    public function saveEditPlan(){
        $plan = $_POST['plan'];
        $cobertura = $_POST['cobertura'];
        $descripcion = $_POST['descripcion'];
        $id_planes=$_POST['id_planes'];
        if(!empty($plan) && !empty($cobertura) && !empty($descripcion) && !empty($id_planes)){
            $this->model->saveEditPlan($plan, $cobertura, $descripcion, $id_planes);
            header('location:'.BASE_URL.'showEditPlans');
        }
        else{
            echo"<p>No se puede editar</p>";
        }
    }
    public function checkLogged(){
        session_start();
        if(!isset($_SESSION['IS_LOGGED'])){
            header("location: ".BASE_URL.'admin');
            die();
        }
    }
 }