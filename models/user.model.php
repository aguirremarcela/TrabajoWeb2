<?php
require_once 'models/base.model.php';

class UserModel extends BaseModel{

   private $db;
   public function __construct(){
     $this->db=$this->createConection();  
   }

   public function get($email,$username =null){
      if($username){
         $sentence= $this->db->prepare("SELECT * FROM usuarios WHERE usuarios.email=? || usuarios.usuario=?");
         $sentence->execute([$email,$username]); 
      }
      else{
         $sentence= $this->db->prepare("SELECT * FROM usuarios WHERE usuarios.email=?");
         $sentence->execute([$email]);
      }
      $user = $sentence->fetch(PDO::FETCH_OBJ);
      return ($user);
   }

   public function getAll($email){
      $sentence= $this->db->prepare("SELECT * FROM usuarios WHERE usuarios.email!=?");
      $sentence->execute([$email]); 
      $users = $sentence->fetchAll(PDO::FETCH_OBJ);
      return ($users);
   }

   public function insert($email,$username,$password){
      $sentence= $this->db->prepare("INSERT INTO usuarios (email, usuario, password) VALUES(?,?,?)");
      $sentence->execute([$email,$username,$password]);
   }

   public function delete($id){
      $sentence= $this->db->prepare("DELETE FROM usuarios WHERE id_usuario=?");
      $sentence->execute([$id]);
   }

   public function confirmRole($role, $email){
      $sentence= $this->db->prepare("UPDATE usuarios SET administrador =  ? WHERE usuarios.email = ?");
      $sentence->execute([$role, $email]);
   }
 }