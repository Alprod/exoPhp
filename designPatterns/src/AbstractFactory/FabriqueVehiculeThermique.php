<?php


namespace App\AbstractFactory;


use App\AbstractFactory\Automobile\AutomobileThermique;
use App\AbstractFactory\Scooter\ScooterThermique;

class FabriqueVehiculeThermique implements FabriqueVehicule
{

    /**
     * @inheritDoc
     */
    public function creerAutomobile($model, $couleur, $carburant, $puissance, $espace)
    {
       return new AutomobileThermique($model, $couleur, $carburant, $puissance, $espace);
    }

    /**
     * @inheritDoc
     */
    public function creerScooter($model, $couleur, $puissance)
    {
        return new ScooterThermique($model, $couleur, $puissance);
    }
}