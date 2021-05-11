<?php

namespace App\AbstractFactory\Automobile;

use App\Outils as Outils;

class AutomobileThermique extends Automobile
{

    public function afficheCaracteristiques()
    {
        $txt = "<p>
                    Automobile $this->carburant de model : $this->model, </br>
                    de couleur : $this->couleur, </br>
                    de puissance : $this->puissance
                    d'éspace : $this->espace 
                </p>";

        //Outils::println($txt);
        echo $txt;
    }
}