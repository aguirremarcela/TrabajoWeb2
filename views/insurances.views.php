<?php

class InsurancesView{
 
    public function showInsurances($seguros){
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
         foreach($seguros as $seguro){
             echo'<li>'. $seguro->categoria.'</li>';
         }
        echo '</u></body>
         </html>';
    }

}