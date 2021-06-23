<?php


namespace App\Builder\Constructeur;


use App\Builder\Liasse\LiassePdf;

class ConstructeurLiasseVehiculePdf extends ConstructeurLiasseVehicule
{
    public function __construct()
    {
        $this->liasse = new LiassePdf();
    }

    /**
     * @inheritDoc
     */
    public function construireBonDeCommande($nomClient)
    {
        $nom_client = ucwords($nomClient);
        $document = "<PDF><div style='margin: 15px 0 ;padding:8px;border: 1px solid black; border-radius: 10px; width: 30%; background: rgba(85,85,85,0.31)'><p> Bon de commande en format <em>PDF</em></p><p>Client : $nom_client .</p></div></PDF>";
        $this->liasse->ajouteDocument($document);
    }

    /**
     * @inheritDoc
     */
    public function construireDemandeImatriculation($nomDemendeur)
    {
        $nom_demandeur = ucwords($nomDemendeur);
        $document = "<PDF><div style='margin: 15px 0 ;padding:8px;border: 1px solid black; border-radius: 10px; width: 30%; background: rgba(85,85,85,0.31)'><p> Demande d'immatriculation en format <em>PDF</em></p><p>Demandeur : $nom_demandeur .</p></div></PDF>";
        $this->liasse->ajouteDocument($document);
    }
}