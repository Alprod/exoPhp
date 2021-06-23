<?php


namespace App\FactoryMethod\Clients;


abstract class Client
{
    protected $commandes = [];

    abstract protected function creeCommande($montant);

    public function nouvelleCommande($montnt): void
    {
        $commande = $this->creeCommande($montnt);
        if($commande->valide()) {
            $commande->paye();
            $this->commandes[] = $commande;
        }
    }
}