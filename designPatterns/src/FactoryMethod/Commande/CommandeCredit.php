<?php


namespace App\FactoryMethod\Commande;


use App\Outils;

class CommandeCredit extends Commande
{
    private const MONTANT_MIN = 1000;
    private const MONTANT_MAX = 5000;

    /**
     * @inheritDoc
     */
    public function valide(): bool
    {
        $montant = number_format($this->montant, 2, ',', ' ');

        if ($this->montant >= self::MONTANT_MIN && $this->montant <= self::MONTANT_MAX) {
            return true;
        }

        if($this->montant < self::MONTANT_MIN) {
            echo "Désolé mais le montant de $montant € demandé est trop basse au vue de la reglementation des demandes de crédit.</br>";
        }

        if($this->montant > self::MONTANT_MAX) {
            echo "Désolé mais le montant de $montant € demandé est trop éléver au vue de la reglementation des demandes de crédit.</br>";
        }
        return false;
    }

    /**
     * @inheritDoc
     */
    public function paye(): void
    {
        $montant = number_format($this->montant, 2, ',', ' ');
        $response = "Le payement de la commande au crédit de  : $montant est éffectué.</br>";
        echo $response;
    }
}