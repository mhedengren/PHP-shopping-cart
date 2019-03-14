<?php
session_start();
include '../partials/database_connection.php';
include '../partials/array_db.php';

/* Purpose of script is to delete customer cart and 
log out. Redirects back to index. Next time user logs in
cart will be empty. */

//Defines username same as session username.
$user_id = $_SESSION["username"];

      $statement = $pdo->prepare("DELETE FROM cart WHERE user_id = :user_id");
      $statement->execute(
          [
    ":user_id" => $_SESSION["username"],
          ]
    );

session_destroy();
header('Location: ../index.php');
?>
