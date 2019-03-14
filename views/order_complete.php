<?php
session_start();
include '../partials/database_connection.php';
include '../partials/array_db.php';
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
    </header>
        <div class="row justify-content-center">
            <div class="col-xs-12 text-center order_confirmation">
            
                     <h2 class="big_thanks_text">Tack!</h2>
                
                <!-- Show thanks for 4 seconds then redirect to another script -->
                <?php header("refresh:4;url=../partials/remove_and_destroy_session.php" ); ?>
            </div>
        </div>
    </main>
</body>
</html>