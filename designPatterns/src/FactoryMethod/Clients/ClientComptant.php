<?php


namespace App\FactoryMethod\Clients;


use App\Builder\Constructeur\ConstructeurLiasseVehiculeHtml;
use App\Builder\Constructeur\ConstructeurLiasseVehiculePdf;
use App\Builder\Vendeur;
use App\FactoryMethod\Commande\CommandeComptant;
use App\Outils;

class ClientComptant extends Client
{

    protected function creeCommande($montant): CommandeComptant
    {
        return new CommandeComptant($montant);
    }

    public function creeLiasseVehicule($nomclient): void
    {
        $choix = Outils::readln("Voulez vous des documents HTML (1) ou PDF (2) : ");

        if($choix == '1') {
            $contructeur = new ConstructeurLiasseVehiculeHtml();
        }else {
            $contructeur = new ConstructeurLiasseVehiculePdf();
        }

        $vendeur = new Vendeur($contructeur);
        $doc = $vendeur->construit($nomclient);
        $doc->imprime();
    }
}