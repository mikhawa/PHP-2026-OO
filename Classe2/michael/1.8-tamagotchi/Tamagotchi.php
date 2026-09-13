<?php
/**
 * Corrigé 1.8 — Bonus 1 : la faim reste entre 0 et 100
 */

declare(strict_types=1);

class Tamagotchi
{
    private int $faim = 50;

    public function __construct(private string $nom) {}

    public function manger(): void
    {
        // On passe par borner() au lieu d'affecter directement
        $this->faim = $this->borner($this->faim - 20);
    }

    public function jouer(): void
    {
        $this->faim = $this->borner($this->faim + 15);
    }

    /**
     * private : c'est un outil INTERNE à la classe.
     * Personne d'autre n'a besoin de l'appeler.
     *
     * max(0, ...)   → jamais en dessous de 0
     * min(100, ...) → jamais au-dessus de 100
     */
    private function borner(int $valeur): int
    {
        return max(0, min(100, $valeur));
    }

    // Bonus 2 : __toString() est appelée automatiquement par echo
    public function __toString(): string
    {
        return '🐣 ' . $this->nom . ' a une faim de ' . $this->faim . '/100';
    }
}

