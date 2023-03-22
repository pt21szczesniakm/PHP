<?php
session_start();

$db = new PDO('mysql:host=localhost;dbname=gra', 'root', '');
$stmt = $db->query('SELECT * FROM hasla');



$login = ($_POST['login']) ?? null;

$blad = [];

if($login != null ){

    $db = new PDO('mysql:host=localhost;dbname=gra', 'root', '');
   
    $stmt2 = $db->query("INSERT INTO `login` (`login`) VALUES ('".$login."');");
        
    } 


$litery = $_SESSION['litery'] ?? '';
$licznik_bledow = $_SESSION['licznik_bledow'] ?? 0;

if (isset($_POST['czyść'])) {
    $litery = '';
    unset($_SESSION['haslo']);
    unset($_SESSION['licznik_bledow']);
    $licznik_bledow = 0;
    unset($_SESSION['litery']);
    $obrazek = "wisiele_" . $licznik_bledow . ".png";
    $_SESSION['st_tm'] = time();
}
else {
    $litera = $_POST['litera'] ?? '';
    if ($litera) {
        $litery .= $litera;
        if (strpos($_SESSION['haslo'], $litera) === false) {
            $licznik_bledow++;
            if ($licznik_bledow > -1 && $licznik_bledow < 12) {
                $obrazek = "wisiele_" . $licznik_bledow . ".png";
            }
        }
    }
}

$_SESSION['litery'] = $litery;
$_SESSION['licznik_bledow'] = $licznik_bledow;

if (!isset($_SESSION['haslo'])) {
    $i = 0;
    foreach($stmt as $s)
    {
        $hasla[$i] = $s['haslo'];
        $i++;
    }
    $_SESSION['haslo'] = $hasla[array_rand($hasla)];
}

$haslo = $_SESSION['haslo'];
$wyswietl_haslo = str_repeat("_", strlen($haslo));

for ($i = 0; $i < strlen($haslo); $i++) {
    if (strpos($litery, $haslo[$i]) !== false) {
        $wyswietl_haslo[$i] = $haslo[$i];
    }
}


$obrazek = "wisiele_" . ($licznik_bledow > 0 && $licznik_bledow < 12 ? $licznik_bledow : 12) . ".png";
if($licznik_bledow>=12)
{
    header('location: przegrales.php');
    echo"Przegrałeś";
}
if(!str_contains($wyswietl_haslo, '_'))
{
    #header(wygrales.php)
    $_SESSION['kn_tm'] = time();
    $_SESSION['rozn'] = ($_SESSION['kn_tm'] - $_SESSION['st_tm']);

    $db = new PDO('mysql:host=localhost;dbname=gra', 'root', '');
    $stmt2 = $db->query("UPDATE `login` SET `login`=('".$login."'),`czas`=('".$_SESSION['rozn']."') WHERE `login` = ('".$login."');");

    echo 'Wygrałeś w '.$_SESSION['rozn'] .' sekund.';

    
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
<img src="titlefast.gif" alt="Wisielec" style="	height: 100px;">
<div class="zgadnięte-litery">
    <p>Zgadnięte litery: <?php echo $litery; ?></p>
</div>

<img src="<?php echo $obrazek; ?>" alt="wisielec">
<h1>Kliknij literę aby rozpocząć</h1>
<form method="POST">
    <div id="alfabet">
        <?php
        $alfabet = range('A', 'Z');
        foreach ($alfabet as $litera) {
            $disabled = strpos($litery, $litera) !== false ? 'disabled' : 'submit';
            $class = strpos($haslo, $litera) !== false ? 'green' : 'red';
            echo '<button class="button '.$class.'" type="'.$disabled.'" name="litera" value="'.$litera.'" '.$disabled.'>'.$litera.'</button>';
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
