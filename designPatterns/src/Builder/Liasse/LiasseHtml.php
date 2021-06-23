<?php


namespace App\Builder\Liasse;


use App\Outils;

class LiasseHtml extends Liasse
{

    /**
     * @param $document
     */
    public function ajouteDocument($document) : void
    {
        if(Outils::str_start_with($document, '<HTML>')) {
            $this->contenu[] = $document;
        }
    }

    /**
     *
     */
    public function imprime() : void
    {
        Outils::println('Liasse HTML');
        foreach ($this->contenu as $contenu) {
            //Outils::println($contenu);
            echo $contenu;
        }
    }
}