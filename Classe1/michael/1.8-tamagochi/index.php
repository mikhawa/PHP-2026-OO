<?php
declare(strict_types=1);

require_once 'Tamagotchi.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 1.8 — Le mini-Tamagotchi</title>
</head>
<body>
    <h1>Exercice 1.8 — Le mini-Tamagotchi</h1>
    <?php

$pixel = new Tamagotchi('Pixel');
echo $pixel . '<br>';   // pas de ->etat() : __toString() fait le travail

echo '<br>' . '10 parties de suite :' . '<br>';

for ($i = 1; $i <= 10; $i++) {
    $pixel->jouer();
    echo '  après ' . $i . ' partie(s) : ' . $pixel . '<br>';
}

echo '<br>' . '✅ La faim s\'arrête à 100 : borner() a fait son travail.' . '<br>';
?>
</body>
</html>