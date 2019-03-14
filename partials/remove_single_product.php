<?php
session_start();
include 'database_connection.php';
include '../array_db.php';

//Defines username same as session username.
$product_name = $_POST["product_name"];
      //Removes all products from cart.
      $statement = $pdo->prepare("DELETE FROM cart WHERE product_name = :product_name");
      $statement->execute(
          [
    ":product_name" => $_POST["product_name"],
          ]
    );
    //Go back to index.
    header('Location: ../index.php');

?>