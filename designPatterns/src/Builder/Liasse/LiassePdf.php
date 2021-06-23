<?php


namespace App\Builder\Liasse;


use App\Outils;

class LiassePdf extends Liasse
{

    public function ajouteDocument($document) : void
    {
        if(Outils::str_start_with($document, '<PDF>')) {
            $this->contenu[] = $document;
        }
    }

    public function imprime() : void
    {
        Outils::println('Liasse PDF');
        foreach ($this->contenu as $contenu) {
            //Outils::println($contenu);
            echo "$contenu </br>";
        }
    }
}