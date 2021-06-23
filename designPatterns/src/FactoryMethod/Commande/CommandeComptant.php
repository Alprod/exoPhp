<?php


namespace App\FactoryMethod\Commande;


use App\Outils;

class CommandeComptant extends Commande
{

    /**
     * @inheritDoc
     */
    public function valide(): bool
    {
        return true;
    }

    /**
     *
     */
    public function paye() : void
    {
        $montant = number_format($this->montant, 2, ',', ' ');
        $response = "<p> Payement de la commande au comptant de  : $montant € est éffectué.</p>";

        echo $response;
    }
}