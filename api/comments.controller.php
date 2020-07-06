<?php
require_once 'models/insurances.model.php';
require_once 'models/comments.model.php';
require_once 'views/api.view.php';

class CommentsController{
    private $modelComments;
    private $modelInsurances;
    private $view;
    private $data;

    public function __construct() {
        $this->modelComments =  new CommentsModel();
        $this->modelInsurances = new InsurancesModel();
        $this->view = new APIView();
        $this->data = file_get_contents("php://input");
    }
    public function getData(){
        return json_decode($this->data);
    }
    public function getComments($params = []){
        $idPlan = $params[':ID'];
        $plan = $this->modelInsurances->getPlan($idPlan);
        $comments = $this->modelComments->getAll($idPlan);

        if(empty($comments) && !empty($plan)){
            $this->view->response("No existen comentarios para el plan con id {$idPlan}", 204);
            die();
        }
        else if(empty($plan)){
            $this->view->response("No existe plan con id {$idPlan}", 404);
            die();
        }
        $this->view->response($comments,200);
    }
    public function addComment($params = []){
        if(session_status()!= PHP_SESSION_ACTIVE){
            session_start();
        }
        if(!isset($_SESSION['IS_LOGGED'])){
            die();
        }
        //Devuelve el objeto JSON enviado por POST.
        $body = $this->getData();
        $comment = $body->comentario;
        $idPlan = $params[':ID'];
        $score = $body->puntaje;
        $idUser = $body->id_usuario_fk;
        //Inserta el comentario.
        $comment_id = $this->modelComments->insert($comment, $score, $idUser, $idPlan);
        if($comment_id){
            $this->view->response("Se agrego el comentario con id: " . $comment_id, 200);
        }else{
            $this->view->response("error", 404);
        }
    }
    public function deleteComments($params = []){
        if(session_status()!= PHP_SESSION_ACTIVE){
            session_start();
        }
        if($_SESSION['ROLE'] != 1){
            die();
        }
        $idComment = $params[':ID'];
        $comment=$this->modelComments->get($idComment);
        if(!empty($comment)){
            $this->modelComments->delete($idComment);
            $this->view->response("El comentario ha sido eliminado con exito", 200);
        }
        else{
            $this->view->response("El comentario ha eliminar no se encontro", 404);
        }
    }
}