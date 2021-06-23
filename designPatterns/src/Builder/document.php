<?php


use App\Builder\Constructeur\ConstructeurLiasseVehiculeHtml;
use App\Builder\Constructeur\ConstructeurLiasseVehiculePdf;
use App\Builder\Vendeur;
use App\Outils;

$choix = Outils::readln("Voulez vous des documents HTML (1) ou PDF (2) : ");

if($choix == '1') {
    $contructeur = new ConstructeurLiasseVehiculeHtml();
}else {
    $contructeur = new ConstructeurLiasseVehiculePdf();
}

$vendeur = new Vendeur($contructeur);
$doc = $vendeur->construit('marc dupont');
$doc->imprime();