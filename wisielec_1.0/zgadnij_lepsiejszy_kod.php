
<?php 

/*
$db = new PDO('mysql:host=localhost;dbname=gra', 'root', '');

$haslo = $_POST['haslo'] ?? null;
$id = $_POST['id'] ?? null;

$stmt = $db->query('SELECT haslo FROM hasla WHERE id=1 ORDER BY RAND() LIMIT 1');
$hasla = $stmt->fetchAll();
//$haslo = ('SELECT haslo FROM hasla WHERE id=1 ORDER BY RAND() LIMIT 2');
var_dump($hasla);
*/
session_start();
$litery = $_SESSION['litery'] ?? '';
if (isset($_POST['czyść'])) {
    $litery = '';
    unset($_SESSION['haslo']);
}
else {
    $litery .= $_POST['litera'] ?? '';
}
$_SESSION['litery'] = $litery;

if (!isset($_SESSION['haslo'])) {
    $hasla = array(
        "POGODA",
        "KOPARKA",
        "JABŁKO",
        "JAJKO",
        "CZASZKA",
        "PRACA",
        "ADAM",
        "JAGODA"
    );
    $_SESSION['haslo'] = $hasla[array_rand($hasla)];
}

$haslo = $_SESSION['haslo'];
$wyswietl_haslo = str_repeat("_", strlen($haslo));

for ($i = 0; $i < strlen($haslo); $i++) {
    if (strpos($litery, $haslo[$i]) !== false) {
        $wyswietl_haslo[$i] = $haslo[$i];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Wisielec</title>
</head>
<body>

<div class="zgadnięte-litery">
    <p>Kliknięte litery: <?php echo $litery; ?></p>
</div>

<img src="wisiele_12.png" alt="wisielec">

<form method="POST">
    <div id="alfabet">
        <?php
        $alfabet = range('A', 'Z');
        foreach ($alfabet as $litera) {
            $disabled = strpos($litery, $litera) !== false ? 'disabled' : '';
            $class = strpos($haslo, $litera) !== false ? 'green' : 'red';
            echo '<button class="button '.$class.'" type="submit" name="litera" value="'.$litera.'" '.$disabled.'>'.$litera.'</button>';
        }
        ?>
    </div>
    <div class="haslo">
        <h1><?php echo $wyswietl_haslo; ?></h1>
    </div>
    <button type="submit" name="czyść" value="1">Czyść</button>
</form>
        
</body>
</html>