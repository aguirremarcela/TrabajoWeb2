<?php
require_once 'models/base.model.php';
class CommentsModel extends BaseModel{
    private $db;
    public function __construct(){
      $this->db=$this->createConection();  
    }
    //Realiza el pedido de todos los comentarios correspondientes al id de un plan.s
    public function getAll($id){
      $sentencia = $this->db->prepare("SELECT  comentarios.comentario, comentarios.id_comentario, comentarios.puntaje, usuarios.email
      FROM usuarios JOIN comentarios ON comentarios.id_usuario_fk=usuarios.id_usuario WHERE comentarios.id_planes_fk=?"); 
      $sentencia->execute([$id]); 
      $comments = $sentencia->fetchAll(PDO::FETCH_OBJ);
      return($comments);
    }
    //Realiza el pedido del comentario que corresponde a un id.
    public function get($id){
      $sentencia = $this->db->prepare("SELECT * FROM comentarios WHERE id_comentario=?"); 
      $sentencia->execute([$id]); 
      $comment = $sentencia->fetch(PDO::FETCH_OBJ);
      return($comment);
    }
    //Elimina un comentario
    public function delete($id){
      $sentencia = $this->db->prepare("DELETE FROM comentarios WHERE id_comentario=?");
      $sentencia->execute([$id]);
    }
    //Inserta un nuevo comentario.
    public function insert($comment, $score, $idUser, $idPlan){
      $sentencia = $this->db->prepare("INSERT INTO comentarios(comentario, puntaje, id_usuario_fk, id_planes_fk ) VALUES(?, ?, ?, ?)");
      $sentencia->execute([$comment, $score, $idUser, $idPlan]);
      //Devuelve el id del ultimo comentario.
      $lastId = $this->db->lastInsertId();
      return $lastId;
    }
}