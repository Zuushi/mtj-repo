<?php include_once('co_bdd.php'); ?>


<?php

//TRAITEMENT DU FORMULAIRE D'AJOUT
if (!empty($_POST)) 
{

	$req = $bdd->prepare('INSERT INTO annonces(titre, date_publi, date_debut, duree, salaire, description, lieu, competences, cat, spe, id_soci, nom_soci) VALUES(:titre, CURDATE(), :date_debut, :duree, :salaire, :description, :lieu, :competences, :cat, :spe, :id_soci, :nom_soci
			)');
		$req->execute(array(

			'titre' => $_POST['titre'],
			'date_debut' =>  $_POST['date_debut'],
			'duree' =>  $_POST['duree'],
			'salaire' => $_POST['budget'],
			'description' =>  $_POST['description'],
			'lieu' =>  $_POST['lieu'],
			'competences' => $_POST['competences'],
			'cat' =>  $_POST['radio'],
			'spe' =>  $_POST['list_spe'],
			'id_soci' =>  $_SESSION['id'],
			'nom_soci' =>  $_SESSION['raison_sociale']
			));
			?>
			<center>
			<div class="alert alert-success">
  				<p>Ajout de la mission réussi !</p>
  			</div>
			</center>
<?php } ?>
