<?php
require_once('../../Managers/GestionType.php');

if (isset($_POST['categoryId'])) {
    $categoryId = $_POST['categoryId'];
    $gestionTypes = new GestionTypes();
    $types = $gestionTypes->FetchTypesByCategory($categoryId);


    $response = array(
        "options" => ''
    );
    foreach ($types as $type) {
        $response['options'].='<option value="' . $type->getId() . '">' . $type->getType() . '</option>';
   
    }

    var_dump($response);
}

?>