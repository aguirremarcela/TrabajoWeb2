<?php
require_once 'models/comments.model.php';
require_once 'views/api.view.php';

class CommentsController{
    private $modelComments;
    private $view;
    private $data;

    public function __construct() {
        $this->modelComments =  new CommentsModel();
        $this->view = new APIView();
        $this->data = file_get_contents("php://input");
    }
    public function getData(){
        return json_decode($this->data);
    }
    public function getComments($params = []){
        $idPlan = $params[':ID'];
        $comments=$this->modelComments->getAll($idPlan);
        if(empty($comments)){
            $this->view->response("no existen comentarios para el plan con id {$idPlan}", 404);
            die();
        }
        $this->view->response($comments,200);
    }
    public function addComment($params = []){
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