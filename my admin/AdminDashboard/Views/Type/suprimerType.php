<?php


include_once('../../Managers/GestionType.php');

    

if(isset($_GET['id'])){

    // Trouver tous les employés depuis la base de données 
    $gestionTypes = new GestionTypes();
    $id = $_GET['id'] ;
  
    $gestionTypes->Supprimer($id);
     
    header('Location: Types.php');
}
?>