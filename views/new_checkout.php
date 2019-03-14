<?php
session_start();
include '../partials/database_connection.php';
include '../partials/array_db.php';
include '../functions/free_shipping.php';
?>
<!DOCTYPE html>
<html lang="sv">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Melker Hedengren Crud</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <header>
        <a class="logotype" href="../index.php"><h1><img src="../images/logga2.png" class="logo" alt="logo" /> COINSTOCK</h1></a>
         <!-- Navbar that toggles the appropriate button depending on login-state. -->
        <nav class="navbar">
                        <ul>
                            <?php if (!isset($_SESSION["username"])) {echo  "<li class='list-inline-item'> <a href='views/register_form.php'>Registrera</a></li>";} ?>
                            <?php if (isset($_SESSION["username"])) {echo  "<li class='list-inline-item'> <a href='../index.php'>Fortsätt handla</a></li>";} ?>
                            <?php if (isset($_SESSION["username"])) {echo  "<li class='list-inline-item'> <a href='../partials/logout.php'>Logga ut</a></li>";} ?>
                        </ul>
                    </nav>
            <!-- Echoes the session username. -->
            <h4 class="checkout_hello"><?php if (isset($_SESSION["username"])) {echo 'Hej ' . $_SESSION["username"] . '!' ;} ?></h4>
        </header>
        <div class="row justify-content-center">
            <div class="col-xs-12 text-center order_confirmation">
                <!-- Order sum will always show, even if 0. -->
                <h4><?php if (isset($_SESSION["username"])) {echo 'Vänligen kontrollera din order. ' ;} ?></h4>
                        <?php 
                            $user_id = $_SESSION["username"];
                            //Prepare a SQL-statement.
                            $statement = $pdo->prepare("SELECT * FROM cart WHERE user_id = :user_id");
                            //Execute it.
                            $statement->execute(
                                [
                                    ":user_id" => $user_id,
                                ]
                            );
                            //And fetch every row that it returns. $cart is now an Associative array.
                            $cart = $statement->fetchAll(PDO::FETCH_ASSOC);

                            $sum=0;
                            //Cart summary, multiplying the amount with the price from the db.
                            foreach ($cart as $cart_item){
                                echo "<p><b>"  . $cart_item["amount"] . ' ' . $cart_item["product_name"] . ' , ' . $cart_item["price"] .  'kr st' . "</b></p>";
                                $sum += $cart_item["amount"] * $cart_item["price"];
                            }
                            //Echo total sum.
                                echo "<p class='highlight_sum'>" . 'Den totala summan är ' . freeShipping($sum) . 'kr' . "</p>";
                        ?> 
                             <?php 
                             //Complete summary. Will only toggle if sum is greater than 1.
                             if (isset($_SESSION["username"]) && $sum > 1) {
                                echo '<br>';
                                echo "<h4>Vi skickar din beställning till:</h4>";
                                $username = $_SESSION["username"];
                                //Prepare a SQL-statement
                                $statement = $pdo->prepare("SELECT * FROM users WHERE username = :username");
                                //Execute it
                                $statement->execute(
                                    [
                                        ":username" => $username,
                                    ]
                                );
                                //And fetch every row that it returns. $cart is now an Associative array
                                $info_row = $statement->fetch(PDO::FETCH_ASSOC);
                                //Echo user-info.
                                echo "<p>"  . $info_row["adress"] .  "</p>";
                                echo "<p>"  . $info_row["postnummer"] . ' ' . $info_row["postort"] .  "</p>";
                                echo "<p>"  . $info_row["telefon"] .  "</p>";
                                echo "<p>"  . $info_row["email"] .  "</p>";
                       ?>  
                        <br>
                        <a class="blue_button_complete_order" href="order_complete.php">Skicka beställning</a>
                    <!-- Close if statement -->
                    <?php } ?>
            </div>
        </div>
    </main>
</body>
</html>