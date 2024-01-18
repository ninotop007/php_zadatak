<?php
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newUsername = $_POST['new_username'];
    $newPassword = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    $xmlFilePath = 'users.xml';
    $users = loadUsersFromXML($xmlFilePath);

    // Provjeri je li korisničko ime već zauzeto
    foreach ($users->user as $user) {
        if ((string)$user->username === $newUsername) {
            echo "Korisničko ime već zauzeto.";
            exit();
        }
    }

    // Dodaj novog korisnika
    $newUser = $users->addChild('user');
    $newUser->addChild('username', $newUsername);
    $newUser->addChild('password', $newPassword);

    saveUsersToXML($users, $xmlFilePath);

    // Registracija uspješna
    header("Location: home.html");
	echo "Registracija uspješna.";
    exit();
}
?>
