<?php


namespace App\AbstractFactory\Scooter;


abstract class Scooter
{
    protected $model;
    protected $couleur;
    protected $puissance;

    /**
     * Scooter constructor.
     * @param $model
     * @param $couleur
     * @param $puissance
     */
    public function __construct($model, $couleur, $puissance)
    {
        $this->model = $model;
        $this->couleur = $couleur;
        $this->puissance = $puissance;
    }

    abstract public function afficheCaracteristiques();

}