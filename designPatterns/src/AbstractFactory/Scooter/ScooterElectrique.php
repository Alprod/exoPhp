<?php


namespace App\AbstractFactory\Scooter;


use App\Outils;

class ScooterElectrique extends Scooter
{

    public function afficheCaracteristiques()
    {
        $txt = "<p>
                    Scooter électrique de modéle : $this->model, </br>
                    de couleur : $this->couleur, </br>
                    de puissance : $this->puissance .
                </p>";
        //Outils::println($txt);
        echo $txt;
    }
}