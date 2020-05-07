<?php
require_once ('libs/Smarty.class.php');
class InsurancesView{
 
    public function showInsurances($seguros){
        $smarty= new Smarty();
        $smarty->assign('title','Seguros Marcin');
        $smarty->display('header.tpl');
        echo'<ul>';
         foreach($seguros as $seguro){
             $id=$seguro->id_categoria;
             echo'<li><a href="seePlansCategory/'.$id.'">'. $seguro->categoria.'</a></li>';
         }
        echo '</u></body>
         </html>';
    }
    public function showPlans($planes){
        echo '<!DOCTYPE html>
        <html lang="es">
       <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Seguros</title>
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
       </head>
       <body>
       <nav class="navbar navbar-dark bg-dark">
       <a class="navbar-brand" href="#">Seguros</a>
       </nav>
       <ul>';
    
       
       foreach($planes as $plane){

           $id=$plane->id_planes;

          echo'<li><a href="descripcion/'.$id.'">'. $plane->plan.'</a></li>';

       //echo' <tr><td>'.$plane->cobertura.'</td><td>'.$plane->descripcion.'</td></tr>';
           
       }

       echo '</ul></body>
         </html>';
    }

}