<?php
namespace App\AbstractFactory\Automobile;

abstract class Automobile
{
    /**
     * @var string
     */
    protected $model;

    /**
     * @var string
     */
    protected $couleur;

    /**
     * @var int
     */
    protected $puissance;

    /**
     * @var mixed
     */
    protected $espace;

    /**
     * @var string
     */
    protected $carburant = 'essence';

    /**
     * Automobile constructor.
     * @param string $model
     * @param string $couleur
     * @param string $carburant
     * @param int $puissance
     * @param mixed $espace
     */
    public function __construct(
        $model,
        $couleur,
        $carburant,
        $puissance,
        $espace)
    {
        $this->model = $model;
        $this->couleur = $couleur;
        $this->carburant = $carburant;
        $this->puissance = $puissance;
        $this->espace = $espace;
    }

    abstract public function afficheCaracteristiques();
}