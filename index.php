<?php
session_start();
include 'partials/database_connection.php';
include 'partials/array_db.php';
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Melker Hedengren Crud</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>
<main class="container">
    <header>
    <a class="logotype" href="index.php"><h1><img src="images/logga2.png" class="logo" alt="logo" /> COINSTOCK</h1></a>
    <!-- Navbar that toggles the appropriate button depending on login-state. -->
            <nav class="navbar">
                    <ul>
                        <?php if (!isset($_SESSION["username"])) {echo  "<li class='list-inline-item'> <a href='views/register_form.php'>Registrera</a></li>";} ?>
                        <?php if (!isset($_SESSION["username"])) {echo  "<li class='list-inline-item'> <a href='views/login_form.php'>Logga in</a></li>";} ?>
                        <?php if (isset($_SESSION["username"])) {echo  "<li class='list-inline-item'> <a href='partials/logout.php'>Logga ut</a></li>";} ?>
                    </ul>
                </nav>
     <!-- Echoes the session username, also toggles the cart if logged in. -->
     <h4><?php if (isset($_SESSION["username"])) {echo 'Välkommen ' . $_SESSION["username"] . '!' ;?></h4>
     
            <!-- Shopping cart that fetches cart items from db. -->
            <div class="col-xs-12 shopping_cart">

                    <?php if (isset($_SESSION["username"])) {echo  'Din varukorg består av: ';} ?>
                        <?php 
                            //Define the user_id variable to fetch correct cart.
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
                            //Echo it.
                            foreach ($cart as $cart_item){
                                echo "<p><b>"  . $cart_item["amount"] . 'st ' . $cart_item["product_name"] . "</b></p>";
                            }
                        ?>   
                <ul>
                    <li class="list-inline-item grey_button"><a class="grey_button" href="partials/empty_cart.php">Töm varukorg</a></li>
                    <li class="list-inline-item blue_button"><a class="blue_button" href="views/new_checkout.php">Till kassan</a></li>
                </ul>
            </div>
            <!-- Closes the cart if-statement. -->
            <?php }  ?>
    </header>
            <div class="row justify-content-around">
                <?php
                //Looping through all the products from the db.
                foreach ($all_products as $product): ?>
                <div class="cardcontainer col-sm-12 col-md-4">
                    <div class="card">
                        <p class="produktnamn"><?= $product["product_name"]; ?> - <?= $product["price"]; ?>kr</p>  
                        <!-- decode the img-blob from db. -->    
                        <img src="data:image/jpeg;base64, <?= base64_encode($product["image"]); ?>" />
                        <!-- input linked to mainform. -->
                        <?= "<input type='number' class='inputcard' form='mainform' name='" .$product["product_name"] . "' placeholder='Ange antal' value=''>"; ?> 
                        <?= "<input type='submit' form='mainform' class='cart_button' form='' value='Lägg i varukorg'>"; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <!-- mainform is hidden but still connected to the foreach (sets direction) -->
            <form hidden name="mainform" id="mainform" action="partials/add_new_product.php" method="POST">
            </form>
    </main>
</body>
</html>