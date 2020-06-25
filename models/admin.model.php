<?php
require_once 'models/base.model.php';
class AdminModel extends BaseModel{
    private $db;
    public function __construct(){
        $this->db=$this->createConection();  
    }

    public function insertCategory($categoria, $image = null){
        $path_img = null;
        if($image){
            $path_img = $this->uploadImage($image);
        }
        $sentencia = $this->db->prepare("INSERT INTO categorias(categoria, imagen) VALUES(?,?)");
        $sentencia->execute([$categoria,$path_img]);
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
    public function saveEditCategory($name,$image,$id_category){
        $path_img = null;
        if($image){
            $path_img = $this->uploadImage($image);
        }
        $sentencia = $this->db->prepare("UPDATE categorias SET categoria =  ?, imagen = ?  WHERE categorias.id_categoria = ?");
        $sentencia->execute([$name,$path_img,$id_category]); 
    }
    public function saveEditPlan($plan, $cobertura, $descripcion, $id_planes){
        $sentencia = $this->db->prepare("UPDATE planes SET plan =  ?, cobertura = ?, descripcion = ?  WHERE planes.id_planes = ?");
        $sentencia->execute([$plan, $cobertura, $descripcion, $id_planes]); 
    }
    private function uploadImage($image){
    $target = 'uploads/images/' . uniqid() . '.jpg';
    move_uploaded_file($image, $target);
    return $target;
    }
}