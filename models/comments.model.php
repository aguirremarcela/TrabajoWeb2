<?php
require_once 'models/base.model.php';
class CommentsModel extends BaseModel{
    private $db;
    public function __construct(){
      $this->db=$this->createConection();  
    }
    public function get($id){
        $sentencia = $this->db->prepare("SELECT  comentarios.comentario, comentarios.puntaje, usuarios.email
         FROM usuarios JOIN comentarios ON comentarios.id_usuario_fk=usuarios.id_usuario WHERE comentarios.id_planes_fk=?"); 
        $sentencia->execute([$id]); 
        $comments = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return($comments);
    }

}