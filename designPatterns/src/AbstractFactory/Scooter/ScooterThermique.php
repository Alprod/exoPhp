<?php


namespace App\AbstractFactory\Scooter;


use App\Outils;

class ScooterThermique extends Scooter
{

    public function afficheCaracteristique()
    {
        $txt = "<p>
                    Scooter à essence de modéle : $this->model, </br>
                    de couleur : $this->couleur, </br>
                    de puissance : $this->puissance .
                </p>";
        //Outils::println($txt);
        echo $txt;
    }
}