<?php
session_start();
include 'database_connection.php';
include '../array_db.php';

//Defines username same as session username.
$user_id = $_SESSION["username"];
      //Delete from cart.
      $statement = $pdo->prepare("DELETE FROM cart WHERE user_id = :user_id");
      $statement->execute(
          [
      ":user_id" => $_SESSION["username"],
          ]
      );
    //Go back to index.
    header('Location: ../index.php');
?>