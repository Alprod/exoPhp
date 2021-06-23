<?php


namespace App\Builder;


use App\Builder\Constructeur\ConstructeurLiasseVehicule;

class Vendeur
{
    /**
     * @var ConstructeurLiasseVehicule
     */
    protected $constructeur;

    /**
     * Vendeur constructor.
     * @param ConstructeurLiasseVehicule $constructeur
     */
    public function __construct(ConstructeurLiasseVehicule $constructeur)
    {
        $this->constructeur = $constructeur;
    }

    public function construit($nomClient)
    {
        $this->constructeur->construireBonDeCommande($nomClient);
        $this->constructeur->construireDemandeImatriculation($nomClient);

        return $this->constructeur->resultat();
    }
}