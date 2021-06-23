<?php


namespace App\Builder\Liasse;


abstract class Liasse
{
    protected $contenu = [];

    abstract public function ajouteDocument($document);
    abstract public function imprime();

}