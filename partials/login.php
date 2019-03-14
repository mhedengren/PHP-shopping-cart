<?php
session_start();

/*
* 1. Koppla upp till databasen
* 2. Hämta användaren från databasen
* 3. Kolla att lösenordet i databasen stämmer överens med lösenordet som användaren har skrivit in i formuläret: password_verify.
*/

include '../partials/database_connection.php';

$username = $_POST["username"];
$password = $_POST["password"];

// No whitespace between $pdo and prepare.
$statement = $pdo->prepare("SELECT * FROM users WHERE username = :username");
// Execute populates the statement and runs it.
$statement->execute(
    [
        ":username" => $username,
    ]
);
// When select is used, fetch must happen
$fetched_user = $statement->fetch();

// 3. Compare
$is_password_correct = password_verify($password, $fetched_user["password"]);

if($is_password_correct){
    //Save user globally to session
    $_SESSION["username"] = $fetched_user["username"];
    header('Location: ../index.php');
} else {
    //Handle errors
    header('Location: login_form.php?login_failed=true');
}

?>