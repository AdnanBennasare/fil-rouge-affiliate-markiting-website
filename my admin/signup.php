<?php
      session_start();

include_once('Managers/GestionAdmin.php');

$gestionadmins = new GestionAdmins();

if (!empty($_POST)) {

    $Phone = $_POST['Phone'];
    $Email = $_POST['Email'];
    $password_hash = password_hash($_POST["Password"], PASSWORD_DEFAULT);
 
    $checkadmins = $gestionadmins->getUserByCredentials($Phone, $Email);
    print_r($checkadmins);

    if (!empty($checkadmins)) {

        foreach ($checkadmins as $key => $checkadmin) {

            if ($checkadmin['phone'] == $_POST['Phone']) {
                echo "User exists with Phone";
                $_SESSION['phone_exist'] = "this phone already exist";
                $_SESSION['phone'] = $_POST['Phone'];

                header('Location: index.php');

            } elseif ($checkadmin['email'] == $_POST['Email']) {
                echo "User exists with Email";
                $_SESSION['email_exist'] = "this email already exist";
                $_SESSION['email'] = $_POST['Email'];

                header('Location: index.php');

            }

        }

    } else {
        $admin = new admin();
        $admin->setPhone($_POST['Phone']);
        $admin->setEmail($_POST['Email']);
        $admin->setPassword($password_hash);
        $gestionadmins->Ajouter($admin);
        header('Location: index.php');
    }
}

