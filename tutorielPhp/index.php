<?php
$title = "Page d'accueil";
$nav = "index";

require './Base/header.php';
?>
<div class="container">
    <div class="px-4 py-5 my-5 text-center">
        <h1 class="display-5 fw-bold">AlBLog81</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Bienvenue sur le blog auquel je vais tout écrire de mes pensées les agréables, les moins coûteuses en émotion et les plus sombres et les plus égoïstes. Je sais vous allez me dire que ça ne sers à rien mais je m'en fiche. C' est juste pour mon plaisir une sorte de journal intime.</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <a type="button" href="contact.php" class="btn btn-success" >Contact</a>
            </div>
        </div>
        <div id="content"></div>
    </div>
</div>
<?php require './Base/footer.php'; ?>