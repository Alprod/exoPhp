<?php


namespace App\Builder\Constructeur;


abstract class ConstructeurLiasseVehicule
{
    /**
     * @var
     */
    protected $liasse;


    /**
     * @param $nomClient
     * @return mixed
     */
    abstract public function construireBonDeCommande($nomClient);

    /**
     * @param $nomDemendeur
     * @return mixed
     */
    abstract public function construireDemandeImatriculation($nomDemendeur);

    public function resultat()
    {
        return $this->liasse;
    }
}