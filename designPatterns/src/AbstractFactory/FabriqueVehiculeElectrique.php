<?php


namespace App\AbstractFactory;


use App\AbstractFactory\Automobile\AutomobileElectrique;
use App\AbstractFactory\Scooter\ScooterElectrique;

class FabriqueVehiculeElectrique implements FabriqueVehicule
{

    /**
     * @inheritDoc
     */
    public function creerAutomobile($model, $couleur, $carburant, $puissance, $espace)
    {
        return new AutomobileElectrique($model, $couleur, $carburant, $puissance, $espace);
    }

    /**
     * @inheritDoc
     */
    public function creerScooter($model, $couleur, $puissance)
    {
        return new ScooterElectrique($model, $couleur, $puissance);
    }
}