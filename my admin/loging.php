<?php 
session_start();
include_once('Managers/GestionAdmin.php');
$gestionadmins = new GestionAdmins();




if (!empty($_POST)) {

    $Phone = $_POST['Phone'];
  
    $checkadmins = $gestionadmins->logingcheckPhone($Phone);

    echo "2222";
    
    if (!empty($checkadmins)) {
      echo "33333";

        foreach ($checkadmins as $checkadmin) {
          print_r($checkadmin);
          if (password_verify($_POST["Password"], $checkadmin["password"])) {

            $_SESSION["adminfound"] = "admin cruddentials are correct";
            header("Location: AdminDashboard/index.php");


        } else {      
          $_SESSION['incorrect-password'] = "the passord you entered is incorrect";
          $_SESSION["PhoneNum"] = $_POST["Phone"];
          header('Location: index.php');

      }

    } 
} else {
  //  NO USER FOUND THAT MEANS THE EMAIL WRONG
  $_SESSION["notexistPhone"] = "this phone number doesn't exist";
  $_SESSION["PhoneNum"] = $_POST["Phone"];
  echo "tttttttttttttttttt";

  header("location: index.php");
}
} else {
  echo "dfsvd";
}
