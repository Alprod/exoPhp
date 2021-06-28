<?php
$title = 'Suivi de votre poid';
require 'Base/header.php';
if(!isset($_SESSION['tabRecap'])) {
    $_SESSION['tabRecap'] = [];
}
$tabRecap = [];
$tabImc = [
        '+ de 40'=>['obésité morbide ou massive', 'table-dark'],
        '35 à 40'=>['obésité sévère', 'table-danger'],
        '30 à 35'=>['obésité modérée', 'table-warning'],
        '25 à 30'=>['surpoids', 'table-primary'],
        '18.5 à 25'=>['corpulence normale','table-success'],
        '16.5 à 18.5'=>['maigreur', 'table-info'],
        '- de 16.5'=>['famine', 'table-dark']
];

if ( isset( $_GET['nom'], $_GET['poids'], $_GET['taille'] ) && !empty( $_GET['nom'] ) && !empty( $_GET['poids']) && !empty($_GET['taille'])  ) {
    $date = (new \DateTime('now'));
    $nom = $_GET['nom'];
    $poids = $_GET['poids'];
    $taille = $_GET['taille'];
    $valueImc = calculIndiceMasseCorporelle($_GET['poids'], $_GET['taille']);
    $fomatDate = $date->format('d/m/Y');
    $_SESSION['tabRecap'][$nom] = [$poids, $taille, $valueImc, $fomatDate];
}

?>
<h1 class="m-5 text-center">Suivi de votre poid</h1>
<div class="row w-75 m-auto my-5">
	<div class="col-md-4">
		<p class="lead p-4">
			Voici un formulaire afin d'indiquer votre poid ainsi que votre taille.
			Une fois ces informations entrer un calcul de votre indice de masse corporelle (IMC),
			Vous sera indiqué, et vous saurez si vous êtes en surpoid ou non.
		</p>
	</div>
	<div class="col-md-8">
		<form action="" method="get">
            <div class="form-floating mb-3 w-75 m-auto">
                <input type="text" name="nom" class="form-control" id="floatingInput" placeholder="exemple 134...">
                <label for="floatingInput">Votre nom</label>
            </div>
			<div class="form-floating mb-3 w-75 m-auto">
				<input type="number" name="taille" class="form-control" id="floatingInput" placeholder="exemple 134...">
				<label for="floatingInput">Votre taille</label>
				<span class="text-muted">Exemple 156</span>
			</div>
			<div class="form-floating w-75 m-auto">
				<input type="number" name="poids" class="form-control" id="floatingPassword" placeholder="exemple 56...">
				<label for="floatingPassword">Votre poids</label>
				<span class="text-muted">Exemple 56</span>
			</div>
            <div class="d-grid gap-2 col-4 mx-auto pt-4">
                <button class="btn btn-success" type="submit">Button</button>
            </div>
        </form>
	</div>
    <div class="col-md-12 m-5 p-5">
        <table class="table table-striped text-center">
            <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Poids (Kg)</th>
                <th scope="col">Taille (Cm)</th>
                <th scope="col">Imc</th>
                <th scope="col">Date</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($_SESSION['tabRecap'] as $nom => $value) : ?>
            <tr>
                <th><?= $nom ?></th>
                <?php for ( $i = 0, $iMax = count( $value ); $i < $iMax; $i++) : ?>
                    <td><?= $value[$i] ?></td>
                <?php endfor; ?>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="col-md-12 my-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <?php if(isset($_GET['poids'],$_GET['taille'])): ?>
                    <?= interpreteurImc($_GET['poids'], $_GET['taille']) ?>
                <?php else: ?>
                    Ici vous trouverez votre indice de masse corporelle.
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <table class="table text-center">
                    <thead>
                    <tr>
                        <th scope="col">IMC</th>
                        <th scope="col">Interprétation</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($tabImc as $imc => $item) :?>
                        <tr class="<?= $item[1] ?>">
                            <td><?= $imc ?></td>
                            <td><?= $item[0] ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
require 'Base/footer.php'
?>