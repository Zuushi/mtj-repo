<?php
include_once('includes/co_bdd.php');

	if (!empty($_POST['salaire_modification']) AND $_POST['checker'] == 0) {

		$id = $_SESSION['id'];
		$salaire_modification = $_POST['salaire_modification'];
		$description_modification = $_POST['description_modification'];
		$duree_modification = $_POST['duree_modification'];
		$competences_modification = $_POST['competences_modification'];
		$date_debut_modification = $_POST['date_debut_modification'];
		$lieu = $_POST['lieu_modification'];

		$req3= "UPDATE annonces SET salaire=:salaire, description=:description, duree=:duree, date_debut=:date_debut, competences=:competences, lieu=:lieu WHERE id_soci=:id_soci";

		$stmt = $bdd->prepare($req3);
		$stmt->bindValue(":salaire", $salaire_modification, PDO::PARAM_INT);
	    $stmt->bindValue(":description", $description_modification, PDO::PARAM_STR);
	    $stmt->bindValue(":duree", $duree_modification, PDO::PARAM_STR);
	    $stmt->bindValue(":date_debut", $date_debut_modification, PDO::PARAM_STR);
	    $stmt->bindValue(":competences", $competences_modification, PDO::PARAM_STR);
	    $stmt->bindValue(":lieu", $lieu, PDO::PARAM_STR);
	    $stmt->bindValue(":id_soci", $id, PDO::PARAM_INT);
	    $stmt->execute();
?><center>
	<div class="alert alert-success">
	<p>Mise à jour de la mission réussi !</p>
	</div>
   </center>
<?php
$_POST['date_publication'] = $_POST['date_publication'];
 $_POST['id'] = $_POST['id'];
 $_POST['titre'] = $_POST['titre'];
 $_POST['entreprise'] = $_POST['entreprise'];
 $_POST['salaire'] = $salaire_modification;
 $_POST['description'] = $description_modification;
 $_POST['duree'] = $duree_modification;
 $_POST['date_debut'] = $date_debut_modification;
 $_POST['lieu'] = $lieu;
 $_POST['competences'] = $competences_modification;

} ?>