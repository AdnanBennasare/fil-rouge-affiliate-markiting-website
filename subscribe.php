<?php
include_once('my admin/AdminDashboard/Managers/GestionUser.php');

$gestionUsers = new GestionUsers();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address";
        exit;
    }

    $user = new User();
    $user->setEmail($email);

    $gestionUsers->Ajouter($user);

    // Return the success message as a response
    echo 'Thank you for subscribing!';

    exit;
}
?>
