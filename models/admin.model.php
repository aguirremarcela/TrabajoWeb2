<?php

class AdminModel{
    private $db;
    public function __construct() {
        $host = 'localhost';
        $userName = 'root';
        $password = '';
        $database = 'db_seguros'; 

        // 1. abro la conexión con MySQL 
        try {
            $this->db = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $userName, $password);            
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (Exception $e) {
            var_dump($e);
        }
    }
    public function insertCategory($categoria, $imagen){
        $sentencia = $this->db->prepare("INSERT INTO categorias(categoria, imagen) VALUES(?,?)");
        $sentencia->execute([$categoria,$imagen]);
    }
    public function insertPlan($plan,$cobertura,$descripcion, $id_categoria){
        $sentencia = $this->db->prepare("INSERT INTO planes (plan, cobertura, descripcion, id_categoria_fk) VALUES (?,?,?,?)");
        $sentencia->execute([$plan,$cobertura,$descripcion,$id_categoria]);
    }
    public function deletePlan($id){
        $sentencia=$this->db->prepare("DELETE FROM planes  WHERE id_planes=?");
        $sentencia->execute([$id]);
    }
    public function deleteCategory($id){
        $sentencia=$this->db->prepare("DELETE FROM categorias  WHERE id_categoria=?");
        $sentencia->execute([$id]);
    }
    public function saveEditCategory($name,$imagen,$id_category){
        $sentencia = $this->db->prepare("UPDATE categorias SET categoria =  ?, imagen = ?  WHERE categorias.id_categoria = ?");
        $sentencia->execute([$name,$imagen,$id_category]); 
    }
    public function saveEditPlan($plan, $cobertura, $descripcion, $id_planes){
        $sentencia = $this->db->prepare("UPDATE planes SET plan =  ?, cobertura = ?, descripcion = ?  WHERE planes.id_planes = ?");
        $sentencia->execute([$plan, $cobertura, $descripcion, $id_planes]); 
    }



}