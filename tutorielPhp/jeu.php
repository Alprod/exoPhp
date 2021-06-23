<?php
$title = 'Devine le nombre';
require 'Base/header.php';
?>
<div class="m-auto w-75 p-5">
    <h1 class="m-3">Deviner le nombre</h1>
    <form action="jeu.php" method="GET">
        <div class="form-group">
            <input type="number" class="form-control w-50" name="chiffre" placeholder="entre 0 et 1000" value="<?= ($valeur['value']) ? htmlentities($valeur['value']) : '' ?>">
        </div>
        <button class="btn btn-primary mt-2" type="submit">Deviner</button>
    </form>
    <div class="mt-3 w-50">
        <?= stateAnswers() ?>
    </div>
</div>
<?php require 'Base/footer.php'; ?>
