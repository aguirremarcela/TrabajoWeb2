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
 }