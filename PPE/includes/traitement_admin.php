<?php
session_start();
include_once('co_bdd.php');

// SI UNE INFO A ETE MODIF POUR LA PARTIE ANNONCES
if (!empty($_POST['id_ann']) and !empty($_POST['supprimer_annonce']) and $_POST['supprimer_annonce'] != 1) {
	
//SI CLICK SUR MODIF SANS RIEN AVOIR MODIFIER.
if (empty($_POST['titre']) AND empty($_POST['nom_soci']) AND empty($_POST['date_publi']) AND empty($_POST['date_debut']) AND empty($_POST['salaire']) AND empty($_POST['description']) AND empty($_POST['lieu']) AND empty($_POST['competences'])) {

	header('Location: ../admin.php');
	
}
//TRAITEMENT MODIFS ANNONCES SOCIETES
else
{

	if (!empty($_POST['titre'])) {

		$req = $bdd->prepare('UPDATE annonces SET titre = :titre WHERE id_ann = :id_ann');
		$req->execute(array(
			'titre' => $_POST['titre'],
			'id_ann' => $_POST['id_ann']
			));

		header('Location: ../admin.php');
	}

	if (!empty($_POST['nom_soci'])) {

		$req = $bdd->prepare('UPDATE annonces SET nom_soci = :nom_soci WHERE id_ann = :id_ann');
		$req->execute(array(
			'nom_soci' => $_POST['nom_soci'],
			'id_ann' => $_POST['id_ann']
			));

		header('Location: ../admin.php');
	}

	if (!empty($_POST['date_publi'])) {

		$req = $bdd->prepare('UPDATE annonces SET date_publi = :date_publi WHERE id_ann = :id_ann');
		$req->execute(array(
			'date_publi' => $_POST['date_publi'],
			'id_ann' => $_POST['id_ann']
			));

		header('Location: ../admin.php');
	}

	if (!empty($_POST['date_debut'])) {

		$req = $bdd->prepare('UPDATE annonces SET date_debut = :date_debut WHERE id_ann = :id_ann');
		$req->execute(array(
			'date_debut' => $_POST['date_debut'],
			'id_ann' => $_POST['id_ann']
			));

		header('Location: ../admin.php');
	}

	if (!empty($_POST['salaire'])) {

		$req = $bdd->prepare('UPDATE annonces SET salaire = :salaire WHERE id_ann = :id_ann');
		$req->execute(array(
			'salaire' => $_POST['salaire'],
			'id_ann' => $_POST['id_ann']
			));

		header('Location: ../admin.php');
	}

	if (!empty($_POST['description'])) {

		$req = $bdd->prepare('UPDATE annonces SET description = :description WHERE id_ann = :id_ann');
		$req->execute(array(
			'description' => $_POST['description'],
			'id_ann' => $_POST['id_ann']
			));

		header('Location: ../admin.php');
	}

	if (!empty($_POST['lieu'])) {

		$req = $bdd->prepare('UPDATE annonces SET lieu = :lieu WHERE id_ann = :id_ann');
		$req->execute(array(
			'lieu' => $_POST['lieu'],
			'id_ann' => $_POST['id_ann']
			));

		header('Location: ../admin.php');
	}

	if (!empty($_POST['competences'])) {

		$req = $bdd->prepare('UPDATE annonces SET competences = :competences WHERE id_ann = :id_ann');
		$req->execute(array(
			'competences' => $_POST['competences'],
			'id_ann' => $_POST['id_ann']
			));

		header('Location: ../admin.php');
	}

}

} //!empty(id_ann)


// SI UNE INFO A ETE MODIF POUR LA PARTIE PROFILS FREE
if (!empty($_POST['id_free']) and !empty($_POST['supprimer_freelance']) and $_POST['supprimer_freelance'] != 1) {
	
//SI CLICK SUR MODIF SANS RIEN AVOIR MODIFIER.
if (empty($_POST['siret_free']) AND empty($_POST['nom']) AND empty($_POST['prenom']) AND empty($_POST['mail']) AND empty($_POST['date_inscr']) AND empty($_POST['competences']) AND empty($_POST['site_web']) AND empty($_POST['tarif']) AND empty($_POST['langues']) AND empty($_POST['localisation'])) {

	header('Location: ../admin.php');
	
}
//TRAITEMENT MODIFS PROFILS FREE
else
{

	if (!empty($_POST['siret_free'])) {

		$req = $bdd->prepare('UPDATE mbr_free SET siret_free = :siret_free WHERE id_free = :id_free');
		$req->execute(array(
			'siret_free' => $_POST['siret_free'],
			'id_free' => $_POST['id_free']
			));

		header('Location: ../admin.php');
	}

	if (!empty($_POST['nom'])) {

		$req = $bdd->prepare('UPDATE mbr_free SET nom = :nom WHERE id_free = :id_free');
		$req->execute(array(
			'nom' => $_POST['nom'],
			'id_free' => $_POST['id_free']
			));

		header('Location: ../admin.php');
	}

	if (!empty($_POST['prenom'])) {

		$req = $bdd->prepare('UPDATE mbr_free SET prenom = :prenom WHERE id_free = :id_free');
		$req->execute(array(
			'prenom' => $_POST['prenom'],
			'id_free' => $_POST['id_free']
			));

		header('Location: ../admin.php');
	}

	if (!empty($_POST['mail'])) {

		$req = $bdd->prepare('UPDATE mbr_free SET mail = :mail WHERE id_free = :id_free');
		$req->execute(array(
			'mail' => $_POST['mail'],
			'id_free' => $_POST['id_free']
			));

		header('Location: ../admin.php');
	}

	if (!empty($_POST['date_inscr'])) {

		$req = $bdd->prepare('UPDATE mbr_free SET date_inscr = :date_inscr WHERE id_free = :id_free');
		$req->execute(array(
			'date_inscr' => $_POST['date_inscr'],
			'id_free' => $_POST['id_free']
			));

		header('Location: ../admin.php');
	}

	if (!empty($_POST['competences'])) {

		$req = $bdd->prepare('UPDATE mbr_free SET competences = :competences WHERE id_free = :id_free');
		$req->execute(array(
			'competences' => $_POST['competences'],
			'id_free' => $_POST['id_free']
			));

		header('Location: ../admin.php');
	}

	if (!empty($_POST['site_web'])) {

		$req = $bdd->prepare('UPDATE mbr_free SET site_web = :site_web WHERE id_free = :id_free');
		$req->execute(array(
			'site_web' => $_POST['site_web'],
			'id_free' => $_POST['id_free']
			));

		header('Location: ../admin.php');
	}

	if (!empty($_POST['tarif'])) {

		$req = $bdd->prepare('UPDATE mbr_free SET tarif = :tarif WHERE id_free = :id_free');
		$req->execute(array(
			'tarif' => $_POST['tarif'],
			'id_free' => $_POST['id_free']
			));

		header('Location: ../admin.php');
	}


	if (!empty($_POST['langues'])) {

		$req = $bdd->prepare('UPDATE mbr_free SET langues = :langues WHERE id_free = :id_free');
		$req->execute(array(
			'langues' => $_POST['langues'],
			'id_free' => $_POST['id_free']
			));

		header('Location: ../admin.php');
	}

	if (!empty($_POST['localisation'])) {

		$req = $bdd->prepare('UPDATE mbr_free SET localisation = :localisation WHERE id_free = :id_free');
		$req->execute(array(
			'localisation' => $_POST['localisation'],
			'id_free' => $_POST['id_free']
			));

		header('Location: ../admin.php');
	}

	
}

} //!empty(id_free)

// SUPPRESSION FREELANCE
if (!empty($_POST['id_free']) and !empty($_POST['supprimer_freelance']) and $_POST['supprimer_freelance'] == 1) {
		$req = $bdd->prepare('DELETE FROM mbr_free WHERE id_free = :id_free');
		$req->execute(array(
			'id_free' => $_POST['id_free']
			));
		$_SESSION['success_supp_freelance'] = 1;
		header('Location: ../admin.php');
}
// SUPPRESSION MISSION
if (!empty($_POST['id_ann']) and !empty($_POST['supprimer_annonce']) and $_POST['supprimer_annonce'] == 1) {
		$req = $bdd->prepare('DELETE FROM annonces WHERE id_ann = :id_ann');
		$req->execute(array(
			'id_ann' => $_POST['id_ann']
			));
		$_SESSION['success_supp_annonce'] = 1;
		header('Location: ../admin.php');
}



?>