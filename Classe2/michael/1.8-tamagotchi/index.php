<?php

declare(strict_types=1);

require_once 'Tamagotchi.php';

$pixel = new Tamagotchi('Pixel');
echo $pixel . '<br>';   // pas de ->etat() : __toString() fait le travail

echo '<br>' . '10 parties de suite :' . '<br>';

for ($i = 1; $i <= 10; $i++) {
    $pixel->jouer();
    echo '  après ' . $i . ' partie(s) : ' . $pixel . '<br>';
}

echo '<br>' . '✅ La faim s\'arrête à 100 : borner() a fait son travail.' . '<br>';