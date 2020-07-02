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
     public function getComments($params = []){
        $idPlan = $params[':ID'];
        $comments=$this->modelComments->get($idPlan);
        if(empty($comments)){
            $this->view->response("no existen comentarios para el plan con id {$idPlan}", 404);
            die();
        }
        $this->view->response($comments,200);
     }


}