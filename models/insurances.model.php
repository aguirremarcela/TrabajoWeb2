<?php
    class InsurancesModel{
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
        public function getAllCategory(){
            $sentencia = $this->db->prepare("SELECT * FROM categorias"); 
            $sentencia->execute(); 
            $categories = $sentencia->fetchAll(PDO::FETCH_OBJ);
            return($categories);
        }
        public function getPlans($id){
            $sentencia = $this->db->prepare("SELECT categorias.categoria, planes.id_planes, planes.plan,
             planes.cobertura, planes.descripcion, planes.id_categoria_fk FROM categorias JOIN planes ON 
            categorias.id_categoria=planes.id_categoria_fk WHERE categorias.id_categoria=?");
            $sentencia->execute([$id]); 
            $planes = $sentencia->fetchAll(PDO::FETCH_OBJ);
            return ($planes);
        }
        public function getPlan($id_plan){
            $sentencia = $this->db->prepare("SELECT planes.id_planes, planes.plan, 
            planes.cobertura, planes.descripcion , planes.id_categoria_fk FROM categorias JOIN planes ON 
            categorias.id_categoria=planes.id_categoria_fk WHERE planes.id_planes=?");
            $sentencia->execute([$id_plan]); 
            $plan = $sentencia->fetch(PDO::FETCH_OBJ);
            return ($plan);
        }
        public function getAllPlans(){
            $sentencia=$this->db->prepare("SELECT * FROM planes");
            $sentencia->execute();
            $plans=$sentencia->fetchAll(PDO::FETCH_OBJ);
            return($plans);    
        }
        public function getCategory($id){
            $sentencia = $this->db->prepare("SELECT * FROM categorias WHERE categorias.id_categoria=?"); 
            $sentencia->execute([$id]); 
            $category = $sentencia->fetch(PDO::FETCH_OBJ);
            return($category);
        }
 }  