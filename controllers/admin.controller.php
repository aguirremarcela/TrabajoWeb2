<?php
 require_once 'models/admin.model.php';
 require_once 'models/insurances.model.php';
 require_once 'models/user.model.php';
 require_once 'views/admin.view.php';
 require_once 'views/errors.view.php';
 
 class AdminController{
    private $model;
    private $modelInsurances;
    private $modelUsers;
    private $view;
    private $errorview;
    public function __construct(){
        $this->model=new AdminModel();
        $this->modelInsurances= new InsurancesModel();
        $this->modelUsers= new UserModel();
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
        $category=$_POST['categoria'];
        $image=$_FILES['input_name']['tmp_name'];
        $nameImg=$_FILES['input_name']['name'];
        if(!empty($category) && ($_FILES['input_name']['type']== "image/jpg" || $_FILES['input_name']['type']== "image/jpeg" || 
        $_FILES['input_name']['type']== "image/png")){
            $this->model->insertCategory($category,$image,$nameImg);
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
        $coverange=$_POST['cobertura'];
        $description=$_POST['descripcion'];
        $id_category=$_POST['id_categoria_fk'];
        if(!empty($plan)&& !empty($coverange) && !empty($id_category) ){
            $this->model->insertPlan($plan,$coverange,$description,$id_category);
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
        $category=$this->modelInsurances->getCategory($id)->imagen;
        if(empty($planes)){
            $this->model->deleteCategory($id);
            unlink($category);
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
    public function editCategory($id){
        $category=$this->modelInsurances->getCategory($id);
        if($category !=false){
            $this->view->editCategory($category);
        }
        else{
            $this->errorview->pageNotFound();
        }
    }
    public function saveEditCategory(){
        $category = $_POST['categoria'];
        $id_category=$_POST['id_categoria'];
        $image=$_FILES['input_name']['tmp_name'];
        $nameImg=$_FILES['input_name']['name'];
        $oldImg=$this->modelInsurances->getCategory($id_category)->imagen;

        if($_FILES['input_name']['error'] == 4 && !empty($oldImg) && !empty($category) && !empty($id_category)){
            $this->model->saveEditCategory($category,$id_category);
            header('location:'.BASE_URL.'showBMCategories');
            die();
        }

        if(!empty($category) && !empty($id_category) && ($_FILES['input_name']['type']== "image/jpg" || $_FILES['input_name']['type']== "image/jpeg" || 
        $_FILES['input_name']['type']== "image/png")){
            $this->model->saveEditCategory($category,$id_category,$nameImg,$image);
            unlink($oldImg);
            header('location:'.BASE_URL.'showBMCategories');
        }
        else{
            $this->errorview->showError('No se puede editar si existe un campo vacio, o el formato de la imagen es incorrecto');
        }
    }
    public function editPlan($id){
        $plan=$this->modelInsurances->getPlan($id);
        
        if($plan != false){
            $this->view->editPlan($plan);
        }
        else{
            $this->errorview->pageNotFound();
        }
    }
    public function saveEditPlan(){
        $plan = $_POST['plan'];
        $coverange = $_POST['cobertura'];
        $description = $_POST['descripcion'];
        $id_plans=$_POST['id_planes'];
        if(!empty($plan) && !empty($coverange) && !empty($description) && !empty($id_plans)){
            $this->model->saveEditPlan($plan, $coverange, $description, $id_plans);
            header('location:'.BASE_URL.'showBMPlans');
        }
        else{
            $this->errorview->showError('No se puede editar si existe un campo vacio');
        }
    }
    public function showUsers(){
        if(session_status()!= PHP_SESSION_ACTIVE){
            session_start();
        }
        if($_SESSION['IS_LOGGED']){
            $email=$_SESSION['EMAIL'];
        }
        $users=$this->modelUsers->getAll($email);
        $this->view->showAllUsers($users);
    }
    public function deleteUser($id){
        $this->modelUsers->delete($id);
        header("location: ".BASE_URL.'showUsers');
    }
    public function confirmRole($email, $role){
        if($role == 1){
            $this->modelUsers->confirmRole(0, $email);
            header("location: ".BASE_URL.'showUsers');
        }
        else if ($role == 0){
            $this->modelUsers->confirmRole(1, $email);
            header("location: ".BASE_URL.'showUsers');
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