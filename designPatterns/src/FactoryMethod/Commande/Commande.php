<?php


namespace App\FactoryMethod\Commande;


abstract class Commande
{
    /**
     * @var
     */
    protected $montant;

    public function __construct($montant)
    {
        $this->montant = $montant;
    }

    /**
     * @return bool
     */
    abstract public function valide() : bool;

    /**
     * @return void
     */
    abstract public function paye() : void;
}