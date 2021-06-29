<?php
$title = "Page de contact";
$nav = "contact";
require_once 'config.php';
require './Base/header.php';

?>
<div class="row justify-content-center">
    <div class="col-md-4 m-5">
        <h1 class="h2 my-5 fw-normal">Nous Contacter</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            A accusamus aliquid amet debitis doloremque earum error est eum fugit,
            libero neque nihil nobis nulla odit omnis pariatur porro praesentium quasi
            sed sequi similique unde vero? Ad aliquam aliquid aperiam atque beatae dolore enim,
            eos eveniet libero minus nihil, perspiciatis quam?
        </p>
    </div>
    <div class="col-md-4 m-5">
        <h1 class="h2 my-5 fw-normal">Horaire d'ouverture</h1>
        <p><?= date('N') ?></p>
        <p>Nous sommes ouvert :</p>
        <ul class="list-unstyled mt-2">
            <?= joursOuverture(JOURS, CRENEAUX) ?>
        </ul>
    </div>
    <div class="col-md-12">
        <div class="form-signin p-4 mx-auto">
            <form>
                <div class="form-floating">
                    <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Nom</label>
                </div>
                <div class="form-floating mt-2">
                    <input type="email" class="form-control" id="floatingEmail" placeholder="name@example.com">
                    <label for="floatingEmail">Email adresse</label>
                </div>

                <div class="form-floating mt-3">
                    <textarea class="form-control text" rows="20" id="floatingTextarea" placeholder="Message"></textarea>
                    <label for="floatingTextarea">Message</label>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-primary mt-5 mb-5" type="submit">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require './Base/footer.php'?>
