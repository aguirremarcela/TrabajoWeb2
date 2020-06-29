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
     public function getAll(){
        $db= $this->createConection();
        $sentencia= $db->prepare("SELECT * FROM usuarios");
        $sentencia->execute(); 
        $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return ($usuarios);
     }
     public function insertUser($username,$password){
        $db= $this->createConection();
        $sentencia= $db->prepare("INSERT INTO usuarios (email, password) VALUES(?,?)");
        $sentencia->execute([$username,$password]);
     }
 }