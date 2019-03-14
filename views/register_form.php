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
              <h2>Registera dig här</h2>
                <br>
                <form name="registerform" action="../partials/register.php" method="POST">
                    <div class="form-group">
                    <label for="register_username">Användarnamn</label>
                    <input type="text" name="username" id="register_username" class="form-control" required>
                    </div>
                    <div class="form-group">
                    <label for="register_password">Lösenord</label>
                    <input type="password" name="password" id="register_password" class="form-control" required>
                    </div>
                    <br>
              <h2>Kontaktuppgifter</h2>
                    <br>
                    <div class="form-group">
                    <label for="name">Namn</label>
                    <input type="text" id="name" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                    <label for="adress">Adress</label>
                    <input type="text" id="adress" class="form-control" name="adress" required>
                    </div>
                    <div class="form-group">
                    <label for="postnummer">Postnummer</label>
                    <input type="number" id="postnummer" class="form-control" name="postnummer" required>
                    </div>
                    <div class="form-group">
                    <label for="postort">Postort</label>
                    <input type="text" id="postort" class="form-control" name="postort" required>
                    </div>
                    <div class="form-group">
                    <label for="telefon">Telefon</label>
                    <input type="text" id="telefon" class="form-control" name="telefon" required> 
                    </div>
                    <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control" name="email" required>  
                    </div>
                    <div class="button_holder text-center">
                    <input class="login_button" id="submit" type="submit" name="submit" value="Skicka">
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
