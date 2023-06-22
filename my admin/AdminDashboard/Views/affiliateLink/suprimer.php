<?php


include_once('../../Managers/GestionLinks.php');

    

if(isset($_GET['id'])){

    // Trouver tous les employés depuis la base de données 
    $gestionLinks = new GestionLinks();
    $id = $_GET['id'] ;
    $gestionLinks->Supprimer($id);
     
    header('Location: affiliatelinks.php');
}
?>