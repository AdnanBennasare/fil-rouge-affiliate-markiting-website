<?php



include_once('../../Managers/GestionUser.php');



// Trouver tous les employés depuis la base de données 

if(isset($_GET['id'])){
    $gestionUsers = new GestionUsers();

    $id = $_GET['id'];

    $gestionUsers->Supprimer($id);
    header('Location: index.php');
}



?>