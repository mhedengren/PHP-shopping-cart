<?php
include '../partials/database_connection.php';

//Saves the user and user-info to db.
//Also hashing password.

$username = $_POST["username"];
$password = $_POST["password"];
$name = $_POST["name"];
$adress = $_POST["adress"];
$postort = $_POST["postort"];
$postnummer = $_POST["postnummer"];
$telefon = $_POST["telefon"];
$email = $_POST["email"];

// password_hash must always have two arguments
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// No whitespace between $pdo and prepare.
$statement = $pdo->prepare("INSERT INTO users
    (username, password, name, adress, postort, postnummer, telefon, email) VALUES (:username, :password, :name, :adress, :postort, :postnummer, :telefon, :email)");
// Execute populates the statement and runs it.
$statement->execute(
    [
        ":username" => $username,
        ":password" => $hashed_password,
        ":name" => $name,
        ":adress" => $adress,
        ":postort" => $postort,
        ":postnummer" => $postnummer,
        ":telefon" => $telefon,
        ":email" => $email
    ]
);

$_SESSION["username"] = $_POST["username"]; 
$_SESSION["name"] = $_POST["name"]; 
$_SESSION["adress"] = $_POST["adress"]; 
$_SESSION["postort"] = $_POST["postort"]; 
$_SESSION["postnummer"] = $_POST["postnummer"]; 
$_SESSION["telefon"] = $_POST["telefon"]; 
$_SESSION["email"] = $_POST["email"]; 

header ('Location: ../index.php');
?>