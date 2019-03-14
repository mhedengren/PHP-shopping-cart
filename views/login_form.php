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
                    <div class="reg-box col-xs-12 col-md-6">
                        <h2>Logga in</h2>
                        <br>
                            <form name="loginform" action="../partials/login.php" method="POST">
                                <div class="form-group">
                                <label for="login_username">Användarnamn</label>
                                <input type="text" name="username" class="form-control" id="login_username" required>
                                </div>
                                <div class="form-group">
                                <label for="login_password">Lösenord</label>
                                <input type="password" name="password" class="form-control" id="login_password" required>
                                </div>
                                <div class="button-holder text-center">
                                <input class="login_button" type="submit" value="Logga in">
                                </div>
                            </form>      
                </div>
            </div>
        </main>
</body>
</html>
