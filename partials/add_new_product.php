<?php
session_start();
include 'database_connection.php';
include 'array_db.php';

//Loop to accsess values
foreach ($all_products as $product){
  $user_id = $_SESSION["username"];
  $product_name = $product["product_name"];
  $amount = ($_POST[$product["product_name"]]);

  //Select from cart to see if there's anything there.
  $statement = $pdo->prepare("SELECT * FROM cart WHERE user_id = :user_id AND product_name = :product_name");
  $statement->execute(
      [
          ":user_id" => $user_id,
          ":product_name" => $product_name
      ]
  );
  //Checking the array
  $check_item_array = $statement->fetch(PDO::FETCH_ASSOC);
  //Retrieve the products column
  $product_exists = $check_item_array["product_name"];
  //If there's a product in cart, update will happen.
  if (isset($check_item_array["product_name"])) {
    //Prepare update statement
    $statement = $pdo->prepare("UPDATE cart SET amount = :amount WHERE product_name = :product_name");
    //Execute it.
    $statement->execute(
        [
        ":product_name" => $product_name,
        //Save previous value and add the new.
        ":amount" => $amount + $check_item_array["amount"]
        ]
      );
        }
  //If there is no product in cart, insert will happen.
  else {

    //Checks that amount is higher than, or equal to 1.
    if ($_POST[$product["product_name"]] >= 1) {

        //Define variables for db insertion.
        $user_id = $_SESSION["username"];
        $product_name = $product["product_name"];
        $price = $product["price"];

        //Prepare insert statement.
        $statement = $pdo->prepare("INSERT INTO cart (user_id, product_name, price, amount) 
          VALUES (:user_id, :product_name, :price, :amount)");

        //Execute it.
        $statement->execute(
          [
          ":user_id" => $user_id,
          ":product_name" => $product_name,
          ":price" => $price,
          ":amount" => $amount
          ]
      );
    }
      }
  }
    //Go back to index.
  header('Location: ../index.php');

?>