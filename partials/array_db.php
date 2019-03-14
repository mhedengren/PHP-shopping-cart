  <?php 
include 'database_connection.php';

//Fetching the products from database.
$statement = $pdo->prepare("SELECT * FROM all_products");
//Execute it
$statement->execute();
//And fetch every row that it returns. $products is now an Associative array
$all_products = $statement->fetchAll(PDO::FETCH_ASSOC);
 
?>