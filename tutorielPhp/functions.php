<?php
session_start([
	'cookie_lifetime' => 86400
]);
/** Barre de navigation **/

function nav_item(
	string $lien,
	string $titre,
	?string $classLink,
	?string $classLi ) : string
{

	if ( $_SERVER['SCRIPT_NAME'] === $lien ) {
		$classLink .= ' active';
	}

	return <<<HTML

     <li class="$classLi">
        <a class="$classLink" aria-current="page" href="$lien">$titre</a>
     </li>

HTML;
}

function nav_menu(
	?string $linkClass,
	?string $liCLass ) : string
{
	return
		nav_item( 'index.php', 'Accueil', $linkClass, $liCLass ) .
		nav_item( 'contact.php', 'Contact', $linkClass, $liCLass ) .
		nav_item( 'jeu.php', 'jeu', $linkClass, $liCLass ) .
		nav_item( 'glace.php', 'Glace Tarif ', $linkClass, $liCLass ).
		nav_item('imc.php', 'Suivi de votre poid', $linkClass, $liCLass);
}


/** Deviner le chiffre **/

function devinerLeChiffre(
	$chiffre = null,
	?int $aDeviner ) : array
{
	$error = null;
	$errorEnter = null;
	$success = null;
	$value = null;
	if ( isset( $chiffre ) ) {
		if ( $chiffre > 1000 ) {
			$errorEnter = 'La valeur maximale à entrer est de 1000';
		}
		if ( empty( $chiffre ) ) {
			$errorEnter = 'Vous devez entrer une valeur';
		}
		if ( $chiffre > $aDeviner ) {
			$error = "Votre chiffre <strong>$chiffre</strong> est trop grand...";
		} elseif ( $chiffre < $aDeviner ) {
			$error = "Votre chiffre <strong>$chiffre</strong> est trop petit";
		} else {
			$success = "Bravo le chiffre <strong>$chiffre</strong> est le bon!!!";
		}
		$value = $chiffre;
	}

	return [ 'error'      => $error,
	         'success'    => $success,
	         'value'      => $value,
	         'errorEnter' => $errorEnter
	];
}

function stateAnswers() : string
{
	$aDeviner = 200;
	if ( isset( $_GET['chiffre'] ) ) {
		$valeur = devinerLeChiffre( $_GET['chiffre'], $aDeviner );
	}
	$html = '';
	if ( isset( $valeur ) ) {
		if ( $valeur['errorEnter'] ) :
			$html .= '<div class="alert alert-danger" role="alert">' .
				$valeur['errorEnter'] .
				'</div>';
		elseif ( $valeur['error'] ) :
			$html .= '<div class="alert alert-info" role="alert">' .
				$valeur['error'] .
				'</div>';
		elseif ( $valeur['success'] ) :
			$html .= '<div class="alert alert-success" role="alert">' .
				$valeur['success'] .
				'</div>';
		endif;
	}

	return $html;
}


/** Composer sa glace **/

function checkbox(
	string $name,
	string $value,
	array $data ) : string
{
	$attributes = '';
	if ( isset( $data[ $name ] ) && in_array( $value, $data[ $name ], true ) ) {
		$attributes .= 'checked';
	}

	return <<<HTML
    <input class="form-check-input" type="checkbox" name="{$name}[]" value="$value" id="Check-$value" $attributes >
HTML;

}

function radio(
	string $name,
	string $value,
	array $data ) : string
{
	$attributes = '';
	if ( isset( $data[ $name ] ) && $value === $data[ $name ] ) {
		$attributes .= 'checked';
	}

	return <<<HTML
    <input class="form-check-input" type="radio" name="$name" value="$value" id="Check-$name" $attributes >
HTML;

}

function formCheckbox(
	array $elements,
	string $name,
	array $data ) : string
{
	$checkBox = '';
	foreach ( $elements as $element => $prix ) {
		$nom = changeSpace( $element );
		$checkBox .= '<div class="form-check">' .
			checkbox( $name, $nom, $data ) .
			'<label class="form-check-label" for="Check-' . $element . '">' . $element . ' - ' . $prix . ' €</label>
            </div>';

	}

	return $checkBox;
}

function formRadio(
	array $elements,
	string $name,
	array $data ) : string
{
	$radio = '';
	foreach ( $elements as $element => $prix ) {
		$nom = changeSpace( $element );
		$radio .= '<div class="form-check">' .
			radio( $name, $nom, $data ) .
			'<label class="form-check-label" for="Check-' . $element . '">' . $element . ' - ' . $prix . ' €</label>
            </div>';

	}

	return $radio;
}

function viewsCheckboxParfum( $elements, $parfums) : string
{
	return formCheckbox( $parfums, $elements, $_GET );
}

function viewsCheckboxSupplement( $element, $supplements ) : string
{

	return formCheckbox( $supplements, $element, $_GET );
}

function viewsCheckboxRadio( $element, $cornets ) : string
{

	return formRadio( $cornets, $element, $_GET );
}

/** Calcul de l'IMC **/

function calculIndiceMasseCorporelle(int $poids, int $taille) : string
{
	$value = $taille * 0.01;
	$carre = (float) bcpow($value, '2', 3);
	$imc = $poids / ($carre);
	$imcFormat = number_format($imc, 1, ',','');
	return $imcFormat ;
}

function renderHtml($classAlert, $html, $indice) : string
{
	return "<div class='alert $classAlert text-center w-75 mx-auto' role='alert'>
 				$html <strong>$indice</strong>
 			</div>";
}

function interpreteurImc($poids, $taille) : string
{
	$html = 'Votre indice de masse corporelle est de :';
	$indice = calculIndiceMasseCorporelle($poids, $taille);
	switch ($indice) {
		case $indice < 16.5:
		case $indice > 40;
			return renderHtml('bckg-black text-light', $html, $indice);
		case $indice >= 35 && $indice < 40;
			return renderHtml('alert-danger',$html, $indice);
		case $indice >= 30 && $indice < 35;
			return renderHtml('alert-warning',$html, $indice);
		case $indice >= 25 && $indice < 30;
			return renderHtml('alert-primary',$html, $indice);
		case $indice >= 18.5 && $indice < 25;
			return renderHtml('alert-success',$html, $indice);
		case $indice > 16.5 && $indice <= 18.5;
			return renderHtml('alert-info',$html, $indice);
		default :
			return "Désolé mais je ne comprends les info que vous m'indiquez";

	}
}


/** Créneaux horaire de contact **/

function creneaux_html(array $creneaux) : string
{
	$horaires = [];
	foreach ($creneaux as $creneau) {
		$horaires[] = " <strong>{$creneau[0]}h</strong> / <strong>{$creneau[1]}h</strong>";
	}
	$horaire = implode(" & ", $horaires);
	return $horaire;
}

function joursOuverture($jours, $crenaux) : string
{
	$phrase = '';

	foreach ($jours as $k => $jour) {
		if($k + 1  === (int) date('N')) {
			$class = 'text-success';
		}else {
			$class = "text-dark";
		}
		$phrase .= '<li class="p-1">';
		if ( empty( creneaux_html( $crenaux[ $k ] ))) {
			$phrase .= "<strong> $jour </strong> : <span class='text-danger fst-italic'>Fermé</span>";
		} else {
			$phrase .= "<strong class= $class > $jour </strong> : " . creneaux_html( $crenaux[ $k ] );
		}
		$phrase .= '</li>';
	}

	return $phrase;
}

/** Tools **/

function dump($dump) : string
{
	return '<pre>'.var_dump($dump).'</pre>';
}

function changeSpace( $element )
{
	return str_replace( "_", " ", strtolower( cleanString( $element ) ) );
}

function cleanString( $text )
{
	$utf8 = [
		'/[áàâãªä]/u' => 'a',
		'/[ÁÀÂÃÄ]/u'  => 'A',
		'/[ÍÌÎÏ]/u'   => 'I',
		'/[íìîï]/u'   => 'i',
		'/[éèêë]/u'   => 'e',
		'/[ÉÈÊË]/u'   => 'E',
		'/[óòôõºö]/u' => 'o',
		'/[ÓÒÔÕÖ]/u'  => 'O',
		'/[úùûü]/u'   => 'u',
		'/[ÚÙÛÜ]/u'   => 'U',
		'/ç/'         => 'c',
		'/Ç/'         => 'C',
		'/ñ/'         => 'n',
		'/Ñ/'         => 'N',
		'/–/'         => '-', // UTF-8 hyphen to "normal" hyphen
		'/[’‘‹›‚]/u'  => ' ', // Literally a single quote
		'/[“”«»„]/u'  => ' ', // Double quote
		'/ /'         => ' ', // nonbreaking space (equiv. to 0x160)
	];

	return preg_replace( array_keys( $utf8 ), array_values( $utf8 ), $text );
}

function isHTTPS($url = "") : bool
{
	//----------NE MODIFIEZ PAS LE CODE AU DESSUS DE CETTE LIGNE, IL SERA REINITIALISE LORS DE l'EXECUTION----------
	return parse_url( $url, PHP_URL_SCHEME ) === 'https';
	//----------NE MODIFIEZ PAS LE CODE EN DESSOUS DE CETTE LIGNE, IL SERA REINITIALISE LORS DE l'EXECUTION----------
}
