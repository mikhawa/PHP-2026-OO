<?php

declare(strict_types=1);

require_once 'De.php';
// ---------------------------------------------------------------- Utilisation

$d6 = De::classique();
$d20 = De::deDonjon();

echo $d6 . PHP_EOL;   // jamais lancé
$d6->lancer();
echo $d6 . PHP_EOL;   // → résultat

echo PHP_EOL . "🎯 Jet d'initiative avec avantage :" . PHP_EOL;
echo '   Résultat : ' . $d20->lancerAvantage() . PHP_EOL;

// --------------------------------------------------- Best of 5 : d6 contre d20

echo PHP_EOL . "⚔️  BEST OF 5 : d6 contre d20" . PHP_EOL;

$scoreD6 = $scoreD20 = 0;

for ($manche = 1; $manche <= 5; $manche++) {
    $jetD6 = $d6->lancer();
    $jetD20 = $d20->lancer();

    $verdict = match (true) {
        $jetD6 > $jetD20 => '🎲 le d6 !',
        $jetD20 > $jetD6 => '🎲 le d20 !',
        default          => '🤝 égalité',
    };

    $jetD6 > $jetD20 ? $scoreD6++ : ($jetD20 > $jetD6 ? $scoreD20++ : null);

    printf("   Manche %d : d6=%2d vs d20=%2d → %s%s", $manche, $jetD6, $jetD20, $verdict, PHP_EOL);
}

printf("%s🏆 Score final : d6 %d — %d d20%s", PHP_EOL, $scoreD6, $scoreD20, PHP_EOL);
echo "   (spoiler : sur 20 faces, le d20 sort en moyenne 10,5 contre 3,5 pour le d6…)" . PHP_EOL;