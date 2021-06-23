<?php


namespace App\Builder\Constructeur;


use App\Builder\Liasse\LiasseHtml;

class ConstructeurLiasseVehiculeHtml extends ConstructeurLiasseVehicule
{
    public function __construct()
    {
        $this->liasse = new LiasseHtml();
    }

    /**
     * @inheritDoc
     */
    public function construireBonDeCommande($nomClient)
    {
        $nom_client = ucwords($nomClient);
        $document = "<HTML><div style='margin: 15px 0 ;padding:8px;border: 1px solid black; border-radius: 10px; width: 30%; background: rgba(5,5,5,0.45)'><p> Bon de commande en format <em>HTML</em></p><p> Client :  $nom_client .</p></div></HTML>";
        $this->liasse->ajouteDocument($document);
    }

    /**
     * @inheritDoc
     */
    public function construireDemandeImatriculation($nomDemendeur)
    {
        $nom_demendeur = ucwords($nomDemendeur);
        $document = "<HTML><div style='margin: 15px 0 ; padding: 8px; border: 1px solid black; border-radius: 10px; width: 30%; background: rgba(5,5,5,0.45)'><p> Demande d'immatriculation en format <em>HTML</em></p><p>Demandeur : $nom_demendeur .</p></div></HTML>";
        $this->liasse->ajouteDocument($document);
    }
}