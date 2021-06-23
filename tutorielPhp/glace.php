<?php
$title = 'Commandez votre glace';
require 'Base/header.php';

$parfums = [
        'fraise'   => 5,
        'menthe'   => 3,
        'vanille'  => 7,
        'chocolat' => 4,
        'praline'  => 2
];
$supplements = [
        'pepites_de_chocolat'  => 0.5,
        'smarties'             => 1.5,
        'speculosse'           => 1,
        'm&ms'                 => 1,
        'eclats_de_lion'       => 1,
        'confetis_au_chocolat' => 0.5
];

$cornets = [
        'pot'       => 2,
        'cornet'    => 3,
        'barquette' => 1
];
$total = 0;
foreach (['parfum', 'supplement', 'cornet'] as $name) {
    if(isset($_GET[$name])) {
        $liste = $name.'s';
        $choix = $_GET[$name];
        if (is_array($choix)) {
            foreach ($choix  as $value) :
                if(isset($$liste[$value])){
                    $total += $$liste[$value];
                }
            endforeach;
        }else if(isset($$liste[ $choix])){
            $total += $$liste[$choix];
        }
    }
}
isHTTPS("https://www.google.com");
?>
<div class="m-auto w-75 pt-5">
	<h1 class="my-3">Composer votre glace</h1>
	<form action="glace.php" method="get">
        <div class="row">
            <div class="col col-md-4">
                <h6>Choisir un ou des parfum(s)</h6>
                <?= viewsCheckboxParfum('parfum', $parfums) ?>
            </div>
            <div class="col col-md-4">
                <h6>Choisir un ou des supplément(s)</h6>
                <?= viewsCheckboxSupplement('supplement', $supplements) ?>
            </div>
            <div class="col col-md-4">
                <h6>Choisir votre cornet</h6>
                <?= viewsCheckboxRadio('cornet', $cornets) ?>
            </div>
        </div>

		<button type="submit" class="btn btn-success mt-3">Voir le prix</button>
	</form>
    <hr>
    <div class="row mt-3">
        <h4 class="text-center my-4">Votre commande</h4>
    <?php if(!empty($_GET['parfum'])): ?>
        <div class="col-md-4">
            <h6>Vous avez choisis <?= count($_GET['parfum']) ?> <?= (count($_GET['parfum']) > 1) ?  'types' :  'type' ?> de parfum</h6>
            <ul class="list-unstyled">
                <?php foreach ( $_GET['parfum'] as $item => $value ):?>
                    <li><?= ucfirst($value) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="col-md-4"> <h6>Vous avez Ajouté <?= count($_GET['supplement']) ?> <?= (count($_GET['supplement']) > 1) ?  'suppléments' :  'supplément' ?></h6>
            <ul class="list-unstyled">

                <?php
                if (!empty($_GET['supplement'])):
                    foreach ( $_GET['supplement'] as $item => $value ):
                ?>
                        <li><?= str_replace("_", " ", ucfirst($value)) ?></li>
                <?php
                    endforeach;
                else :
                ?>
                    <li>Pas de Supplément choisit</li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="col-md-4"><h6>Vous avez choisis un type de cornet : <em><?= ucfirst($_GET['cornet']) ?></em></h6>
        </div>
        <hr class="my-3">
        <div class="col-md-12">
            <p>Le prix total est de :
                <?= $total?> €
            </p>
            <button type="submit" class="btn btn-success">Paiment</button>
        </div>
    </div>
    <?php else: ?>
    <p class="mt-4">Vous n'avez fait aucun choix</p>
    <?php endif;?>
</div>
<?php require 'Base/footer.php' ?>
