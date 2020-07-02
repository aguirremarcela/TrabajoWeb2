<?php
 
 class UserModel{
    private function createConection(){
        $host = 'localhost';
        $userName = 'root';
        $password = '';
        $database = 'db_seguros';

        try {
        $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $userName, $password);
        } catch (Exception $e) {
            var_dump($e);
        }
        return $pdo;
    }
     public function getUser($username){
        $db= $this->createConection();
        $sentencia= $db->prepare("SELECT * FROM usuarios WHERE usuarios.email=?");
        $sentencia->execute([$username]); 
        $usuario = $sentencia->fetch(PDO::FETCH_OBJ);
        return ($usuario);
     }
     public function getAll($email){
        $db= $this->createConection();
        $sentencia= $db->prepare("SELECT * FROM usuarios WHERE usuarios.email!=?");
        $sentencia->execute([$email]); 
        $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return ($usuarios);
     }
     public function insertUser($username,$password){
        $db= $this->createConection();
        $sentencia= $db->prepare("INSERT INTO usuarios (email, password) VALUES(?,?)");
        $sentencia->execute([$username,$password]);
     }
     public function delete($id){
        $db= $this->createConection();
        $sentencia= $db->prepare("DELETE FROM usuarios WHERE id_usuario=?");
        $sentencia->execute([$id]);
     }
     public function confirmRole($role, $email){
      $db= $this->createConection();
      $sentencia= $db->prepare("UPDATE usuarios SET administrador =  ? WHERE usuarios.email = ?");
      $sentencia->execute([$role, $email]);
     }
 }