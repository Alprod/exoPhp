<?php

namespace App\AbstractFactory\Automobile;

use App\Outils as Outils;

class AutomobileElectrique extends Automobile
{

    public function afficheCaracteristiques()
    {
        $txt = "<p>
                    Automobile electrique de model : $this->model, </br>
                    de couleur : $this->couleur, </br>
                    de puissance : $this->puissance, </br>
                    d'éspace : $this->espace 
               </p>";

        //Outils::println($txt);
        echo $txt;
    }
}