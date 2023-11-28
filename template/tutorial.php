<!---->
<!---->
<!-- TENTO soubor slouží jako sklad kódů a tutoriál jak jej nahrát :) NEVKLÁDAT CELÝ POUZE JEHO ČÁSTI PODLE NÁVODU NÍŽ-->
<!---->
<!---->
<!-- MODAL okna pro Balíkovnu a Balíkovnu na poštu-->
<!-- Vložit do Formuláře s RADIO inputy které po kliku otevíraji modal okno a výsledek se následně vloží do výsledkových inputů -->
<!-- v MARF Eshop projektu v souboru "/stranky/stranka_platba-a-prevzeti.php"-->
<!---->
<!---->
<!---->
<!--NA-POŠTU-->
<!---->
<!---->

<div class="modal-overlay-napostu"></div>


<div class="modal-box-napostu">
	<button id="close-modal-napostu-button" type="button">x</button>
	<iframe width="100%" height="100%" style="background:white" title="Výběr místa pro vyzvednutí zásilky" src="https://b2c.cpost.cz/locations/?type=POST_OFFICE" allow="geolocation"></iframe>

</div>

<!---->
<!---->
<!--Balikovna-->
<!---->
<!---->

<div class="modal-overlay-balikovna"></div>


<div class="modal-box-balikovna">
	<button id="close-modal-balikovna-button" type="button">x</button>
	<iframe width="100%" height="100%" style="background:white" title="Výběr místa pro vyzvednutí zásilky" src="https://b2c.cpost.cz/locations/?type=BALIKOVNY" allow="geolocation"></iframe>


</div>

<!---->
<!---->
<!---->
<!---->
<!--Inputy pro výsledky-->
<!---->
<!---->
<!---->
<!---->
<input class="typeOfBox" name="typeOfBox" value="" type="hidden">
<input class="boxID" name="boxID" value="" type="hidden">
<input class="boxAdress" name="boxAdress" value="" type="hidden">



<!--

Data dále načítat do $_SESSIONS na základě projektu do kterého je vkládano.

Příklad:

Pro ESHOP MARF vkládame následující podmínku do souboru "/stranky/akce/platba-a-prevzeti.php"

-->

<?php
if (isset($_POST["typeOfBox"]) && $_POST['typeOfBox'] == "Balikovna") {
	$Balikovna = isset($_POST['boxID']) ? $_POST['boxID'] : null;
	$BalikovnaAdresa = isset($_POST['boxAdress']) ? $_POST['boxAdress'] : null;
} else {
	$Balikovna = null;
	$BalikovnaAdresa = null;
}
?>

<!---->
<!---->
<!-- Data se poté vkládájí do $_SESSIONS -->
<!---->
<!---->

<?php
//NAJÍT! tohle bývá již navedeno, zkontrolujeme a jdeme dál
$_SESSION["OBJEDNAVKA_UDAJE"]["Balikovna"] = $Balikovna;
$_SESSION["OBJEDNAVKA_UDAJE"]["BalikovnaAdresa"] = $BalikovnaAdresa;
?>
<!---->
<!---->
<!-- Najít podmínku "if ($Postovne !== null) {}" a vložit následující hlídání zda jsou inputy naplněny -->
<!-- else odkomentovat - zakomentováno jen aby podmínka neházela v tomto souboru chybu -->
<!---->
<!---->
<?php
/* else */ if ($Postovne == POSTOVNE_POSTA_BALIKOVNA) {
				if (is_null($Balikovna) || is_null($BalikovnaAdresa)) {
					$stav .= $jazyk->vratPreklad('Bylo zvoleno poštovné Balíkovna, ale nezvolili jste výdejní místo.') . '<br>';
					}
			} else if ($Postovne == POSTOVNE_POSTA_BALIK_NA_POSTU) {
				if (is_null($Balikovna) || is_null($BalikovnaAdresa)) {
					$stav .= $jazyk->vratPreklad('Bylo zvoleno poštovné Balíkovna - Na poštu, ale nezvolili jste výdejní místo.') . '<br>';
				}
			}
?>
<!---->
<!---->
<!-- Uprávíme SQL dotazy do následující podoby -->
<!-- else odkomentovat - zakomentováno jen aby podmínka neházela v tomto souboru chybu -->
<!-- SQL dotazy již pravděpodobně v projektu jsou takže najít a zkontrolovat zda sedí -->
<?php
/* else */  if ($Postovne == POSTOVNE_POSTA_BALIKOVNA || $Postovne == POSTOVNE_POSTA_BALIKOVNA) {
			$sql = "UPDATE objednavky SET ";
			$sql .= "obj_parcelshop = null, ";
			$sql .= "obj_parcelshop_adresa = null, ";
			$sql .= "obj_heureka_point = null, ";
			$sql .= "obj_heureka_point_typ_dopravy_id = null, ";
			$sql .= "obj_heureka_point_adresa = null, ";
			$sql .= "obj_balikovna = '" . gpc_addslashes($Balikovna) . "', ";
			$sql .= "obj_balikovna_adresa = '" . gpc_addslashes($BalikovnaAdresa) . "', ";
			$sql .= "obj_vydejni_misto = '' ";
			$sql .= "where id_objednavka = " . gpc_addslashes($objednavkaId) . " \n";
			$conn->query($sql);
		} else if ($Postovne == POSTOVNE_POSTA_BALIK_NA_POSTU || $Postovne == POSTOVNE_POSTA_BALIK_NA_POSTU) {
			$sql = "UPDATE objednavky SET ";
			$sql .= "obj_parcelshop = null, ";
			$sql .= "obj_parcelshop_adresa = null, ";
			$sql .= "obj_heureka_point = null, ";
			$sql .= "obj_heureka_point_typ_dopravy_id = null, ";
			$sql .= "obj_heureka_point_adresa = null, ";
			$sql .= "obj_balikovna = '" . gpc_addslashes($Balikovna) . "', ";
			$sql .= "obj_balikovna_adresa = '" . gpc_addslashes($BalikovnaAdresa) . "', ";
			$sql .= "obj_vydejni_misto = '' ";
			$sql .= "where id_objednavka = " . gpc_addslashes($objednavkaId) . " \n";
			$conn->query($sql);
		}
?>

<!-- Zkontrolujeme databázi zda se data naplnily -->
<!-- Tabulka "objednavky" sloupce "obj_balikovna" a "obj_balikovna_adresa"-->

<!-- HOTOVO :) -->

