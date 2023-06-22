<?php


include_once('../../Managers/GestionProducts.php');

    

if(isset($_GET['id'])){

    // Trouver tous les employés depuis la base de données 
    $gestionProducts = new GestionProduct();
    $id = $_GET['id'] ;
    $gestionProducts->Supprimer($id);
     
    header('Location: index.php');
}



?>