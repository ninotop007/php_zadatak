<?php
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $xmlFilePath = 'users.xml';
    $users = loadUsersFromXML($xmlFilePath);

    foreach ($users->user as $user) {
        if ((string)$user->username === $username && password_verify($password, (string)$user->password)) {
            // Prijavljivanje uspješno
            header("Location: index.html");
            exit();
        }
    }

    // Prijavljivanje neuspješno
    echo "Pogrešno korisničko ime ili lozinka.";
}
?>
