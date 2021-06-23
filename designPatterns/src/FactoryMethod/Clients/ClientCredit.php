<?php


namespace App\FactoryMethod\Clients;

use App\FactoryMethod\Commande\CommandeCredit;

class ClientCredit extends Client
{

    protected function creeCommande($montant) : CommandeCredit
    {
        return new CommandeCredit($montant);
    }
}