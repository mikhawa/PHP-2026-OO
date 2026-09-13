<?php
/**
 * Corrigé 1.D — Le lanceur de dés parlant
 * readonly, fabriques statiques, __toString().
 */

declare(strict_types=1);

class De
{
    private ?int $dernierLancer = null;

    public function __construct(public readonly int $faces = 6) {}

    public function lancer(): int
    {
        // random_int() est cryptographiquement sûr, contrairement à rand().
        return $this->dernierLancer = random_int(1, $this->faces);
    }

    public function __toString(): string
    {
        return $this->dernierLancer === null
            ? "🎲 Dé à {$this->faces} faces (jamais lancé)"
            : "🎲 Dé à {$this->faces} faces → {$this->dernierLancer}<br>";
    }

    // ------------------------------------------------------ Fabriques statiques
    // Une fabrique est une méthode statique qui construit un objet préconfiguré.
    // Le type de retour `static` (PHP 8.0) = « une instance de la classe appelée ».

    public static function classique(): static
    {
        return new static(6);
    }

    public static function deDonjon(): static
    {
        return new static(20);
    }

    // Bonus : le jet « avec avantage » cher aux rôlistes.
    public function lancerAvantage(): int
    {
        $a = random_int(1, $this->faces);
        $b = random_int(1, $this->faces);
        echo "   (jets : $a et $b → on garde le meilleur)<br>" ;
        return $this->dernierLancer = max($a, $b);
    }
}

