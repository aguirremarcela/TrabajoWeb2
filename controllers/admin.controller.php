<?php
 require_once 'models/admin.model.php';
 require_once 'models/insurances.model.php';
 require_once 'views/admin.views.php';
 require_once 'views/errors.views.php';
 
 class AdminController{
    private $model;
    private $modelInsurances;
    private $view;
    private $errorview;
    public function __construct(){
        $this->model=new AdminModel();
        $this->modelInsurances= new InsurancesModel();
        $this->view=new AdminView();
        $this->errorview= new ErrorsView();
        $this->checkLogged();
    }
    public function showABM(){
        $this->view->showABM();
    }
    public function showAddCategory(){
        $categories=$this->modelInsurances->getAllCategory();
        $this->view->formAddCategory($categories);
    }
    public function addCategory(){
        $categoria=$_POST['categoria'];
        $imagen=$_FILES['input_name']['tmp_name'];
        $nameImg=$_FILES['input_name']['name'];
        if(!empty($categoria) && ($_FILES['input_name']['type']== "image/jpg" || $_FILES['input_name']['type']== "image/jpeg" || 
        $_FILES['input_name']['type']== "image/png")){
            $this->model->insertCategory($categoria,$imagen,$nameImg);
            header('location:'.BASE_URL.'showAddCategory');
        }
        else{
            $this->errorview->showError('El campo categoria se encuentra vacío o el formato de la imagen no es admitido');
        }
    }
    public function showAddplan(){
        $categories=$this->modelInsurances->getAllCategory();
        $plans=$this->modelInsurances->getAllPlans();
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
            $this->errorview->showError('Existen uno o mas campos vacios');
        }
    }
    public function showBMCategories(){
        $categories=$this->modelInsurances->getAllCategory();
        $this->view->showAllCategories($categories);
    }
    public function deleteCategory($id){
        $planes=$this->modelInsurances->getPlans($id);
        $categorie=$this->modelInsurances->getCategory($id)->imagen;
        if(empty($planes)){
            $this->model->deleteCategory($id);
            unlink($categorie);
            header('location:'.BASE_URL.'showBMCategories');
        }
        else{
            $this->errorview->showError('No se puede eliminar esta categoria porque tiene planes asociados a ella');
        }
    }
    public function showBMPlan(){
        $plans=$this->modelInsurances->getAllPlans();
        $this->view->showAllPlans($plans);
    }
    public function deletePlan($id){
        $this->model->deletePlan($id);
        header('location:'.BASE_URL.'showBMPlans');
    }
    public function showEditCategory(){
        $categories=$this->modelInsurances->getAllCategory();
        $this->view->showEditCategory($categories);
    }
    public function editCategory($id){
        $category=$this->modelInsurances->getCategory($id);
        $this->view->editCategory($category);
    }
    public function saveEditCategory(){
        $category = $_POST['categoria'];
        $id_category=$_POST['id_categoria'];
        $imagen=$_FILES['input_name']['tmp_name'];
        $nameImg=$_FILES['input_name']['name'];
        $categorie=$this->modelInsurances->getCategory($id_category)->imagen;

        if(!empty($category) && !empty($id_category) && ($_FILES['input_name']['type']== "image/jpg" || $_FILES['input_name']['type']== "image/jpeg" || 
        $_FILES['input_name']['type']== "image/png")){
            $this->model->saveEditCategory($category,$imagen,$id_category,$nameImg);
            unlink($categorie);
            header('location:'.BASE_URL.'showBMCategories');
        }
        else{
            $this->errorview->showError('No se puede editar si existe un campo vacio, o el formato de la imagen es incorrecto');
        }
    }
    public function showEditPlans(){
        $plans=$this->modelInsurances->getAllPlans();
        $this->view->showEditPlans($plans);
    }
    public function editPlan($id){
        $plan=$this->modelInsurances->getPlan($id);
        $this->view->editPlan($plan);
    }
    public function saveEditPlan(){
        $plan = $_POST['plan'];
        $cobertura = $_POST['cobertura'];
        $descripcion = $_POST['descripcion'];
        $id_planes=$_POST['id_planes'];
        if(!empty($plan) && !empty($cobertura) && !empty($descripcion) && !empty($id_planes)){
            $this->model->saveEditPlan($plan, $cobertura, $descripcion, $id_planes);
            header('location:'.BASE_URL.'showBMPlans');
        }
        else{
            $this->errorview->showError('No se puede editar si existe un campo vacio');
        }
    }
    public function checkLogged(){
        if(session_status()!= PHP_SESSION_ACTIVE){
            session_start();
        }
        if(!isset($_SESSION['IS_LOGGED'])){
            header("location: ".BASE_URL.'login');
            die();
        }
        elseif($_SESSION['ROLE'] != 1){
            header("location: ".BASE_URL.'home');
        }
    }
 }