<?php
    class InsurancesModel{
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
        public function getCategory(){
            $db =$this->createConection();
            $sentencia = $db->prepare("SELECT * FROM categorias"); 
            $sentencia->execute(); 
            $categories = $sentencia->fetchAll(PDO::FETCH_OBJ);
            return($categories);
        }
        public function getPlans($id){
            $db=$this->createConection();
            $sentencia = $db->prepare("SELECT categorias.categoria, planes.id_planes, planes.plan,
             planes.cobertura, planes.descripcion FROM categorias JOIN planes ON 
            categorias.id_categoria=planes.id_categoria_fk WHERE categorias.id_categoria=?");
            $sentencia->execute([$id]); 
            $planes = $sentencia->fetchAll(PDO::FETCH_OBJ);
            return ($planes);
        }
        public function getPlan($id_plan){
            $db=$this->createConection();
            $sentencia = $db->prepare("SELECT categorias.categoria, planes.id_planes, planes.plan, 
            planes.cobertura, planes.descripcion FROM categorias JOIN planes ON 
            categorias.id_categoria=planes.id_categoria_fk WHERE planes.id_planes=?");
            $sentencia->execute([$id_plan]); 
            $plan = $sentencia->fetch(PDO::FETCH_OBJ);
            return ($plan);
        }
        public function insertCategory($categoria){
            $db=$this->createConection();
            $sentencia = $db->prepare("INSERT INTO categorias(categoria) VALUES(?)");
            $sentencia->execute([$categoria]);
        }
        public function insertPlan($plan,$cobertura,$descripcion, $id_categoria){
            $db=$this->createConection();
            $sentencia = $db->prepare("INSERT INTO planes (plan, cobertura, descripcion, id_categoria_fk) VALUES (?,?,?,?)");
            $sentencia->execute([$plan,$cobertura,$descripcion,$id_categoria]);
        }
        public function getAllPlans(){
            $db=$this->createConection();
            $sentencia=$db->prepare("SELECT * FROM planes");
            $sentencia->execute();
            $plans=$sentencia->fetchAll(PDO::FETCH_OBJ);
            return($plans);
            
        }
 }  