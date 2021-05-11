<?php


namespace App\AbstractFactory;


interface FabriqueVehicule
{
    /**
     * @param $model
     * @param $couleur
     * @param $carburant
     * @param $puissance
     * @param $espace
     * @return mixed
     */
    public function creerAutomobile($model, $couleur, $carburant, $puissance, $espace);

    /**
     * @param $model
     * @param $couleur
     * @param $puissance
     * @return mixed
     */
    public function creerScooter($model, $couleur, $puissance);
}