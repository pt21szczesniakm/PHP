<?php

session_start();
session_destroy();

session_start();

$login = ($_POST['login']) ?? null;

$blad = [];

if($login != null ){

    $db = new PDO('mysql:host=localhost;dbname=gra', 'root', '');
   
    $stmt = $db->query("INSERT INTO `login` (`login`) VALUES ('".$login."');");
        
    }   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Wisielec</title>
</head>
<body>
<div class="col order-5">
    <div class="login">
        <h1>PODAJ NAZWĘ</h1>
        <?php if(!empty($blad)): ?>
        <p></p><?= implode("<br>", $blad); ?></p>
        <?php endif; ?>
        <form method="post" action="zgadnij.php">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="login" id="floatingInput" placeholder="Login">
        <label for="floatingInput">Login</label>
      </div>
      <input type="submit" class="btn btn-outline-primary mb-3" value="Potwierdź"> 
    </form>
    </div>
</div>





<footer>
    <img src="wavve.png" alt="" style="width: 100%; heigth: 100%;">
</footer>

</body>
</html>