<?php

use App\AbstractFactory\FabriqueVehiculeElectrique;
use App\AbstractFactory\FabriqueVehiculeThermique;
use App\Outils;

require 'vendor/autoload.php';


echo '<h1>Bonjour</h1>';
const NBR_AUTOS = 2;
const NB_SCOOTERS = 2;

$autos = [];
$scooters = [];

$choix = Outils::readln(
    'Voulez-vous utiliser des véhicules éléctriques (1) ou'.
    ' à essence (2) : ');

if($choix == '1') {
    $fabrique = new FabriqueVehiculeElectrique();
}else {
    $fabrique = new FabriqueVehiculeThermique();
}

for($i = 0; $i < NBR_AUTOS; $i++) {
    $autos[$i] = $fabrique->creerAutomobile('Nissan', 'bleu', 'hybride rechargable', 6 + $i, 7);
}

for ($j = 0; $j < NB_SCOOTERS; $j++) {
    $scooters[$j] = $fabrique->creerScooter('Vespa', 'Noir/Blanc', 2 + $j);
}

foreach ($autos as $auto) {
    $auto->afficheCaracteristiques();
}
foreach ($scooters as $scooter) {
    $scooter->afficheCaracteristiques();
}
