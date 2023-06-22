<?php



include_once('../../Managers/GestionCategory.php');



// Trouver tous les employés depuis la base de données 


if(isset($_GET['id'])){
    $gestionCategorys = new GestionCategory();

    $id = $_GET['id'];


    $gestionCategorys->Supprimer($id);
    header('Location: index.php');
}



?>