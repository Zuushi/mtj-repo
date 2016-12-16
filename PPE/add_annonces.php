<?php
session_start();
include_once('co_bdd.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

	<style type="text/css">
		#c, #cc, #java, #php, #css, #js, #cisco {font-weight: bold;}
		#c[disabled ], #cc[disabled ], #java[disabled ], #php[disabled ], #css[disabled ], #js[disabled ], #cisco[disabled ] {color: #D1D1D1; font-weight: normal;}
	</style>

</head>

<div class="container">

	<h4>Ajouter une offre :</h4><br />

	<form method="post" action="">

		<div class="form-group">
			<label class="radio-inline">
				<input type="radio" id="radio_dev" name="radio" id="inlineRadio1" value="dev"> Développement web
			</label>
			<label class="radio-inline">
				<input type="radio" id="radio_prog" name="radio" id="inlineRadio2" value="prog"> Programmation logicielle
			</label>
			<label class="radio-inline">
				<input type="radio" id="radio_reseau" name="radio" id="inlineRadio3" value="reseau"> Réseau
			</label>
		</div>
		<div class="form-group">
			<select id="list_spe" name="list_spe" style="width: 400px;" class="form-control" disabled>

				<option value="defaut">Langages/Spécialités</option>

				
				<option id="php" value="php" disabled>Php</option>
				<option id="css" value="css" disabled>Html/Css</option>
				<option id="js" value="js" disabled>Javascript/Jquery/Ajax</option>

				<option id="c" value="c" disabled="b">C</option>
				<option id="cc" value="c++" disabled>C++</option>
				<option id="java" value="java" disabled>Java</option> 

				<option id="cisco" value="cisco">Certifié Cisco systeme</option>


			</select>
		</div>
		<div class="form-group">
			
			<input style="width: 400px;" type="text" class="form-control" id="titre" name="titre" placeholder="Titre de l'annonce">
		</div>
		<div class="form-group">
			<textarea style="width: 400px;" class="form-control" id="description" name="description" rows="3" placeholder="Description de l'annonce"></textarea>
		</div>
		<div class="form-group">
			<textarea style="width: 400px;" class="form-control" id="competences" name="competences" rows="3" placeholder="Compétences requises"></textarea>
		</div>
		<div class="form-group">

			<input style="width: 400px;" type="text" class="form-control" id="budget" name="budget" placeholder="Budget (en €)">
		</div>

		<div class="form-group">
			<label>Date de début de mission :</label>
			<input style="width: 400px;" type="date" class="form-control" id="date_debut" name="date_debut" placeholder="date de début">
		</div>

		<div class="form-group">

			<input style="width: 400px;" type="text" class="form-control" id="duree" name="duree" placeholder="Durée">
		</div>

		<div class="form-group">

			<input style="width: 400px;" type="text" class="form-control" id="lieu" name="lieu" placeholder="Lieu">
		</div>

		<button style="width: 400px;" id="submit" type="submit" disabled="true" class="btn btn-success">Poster</button>
	</form>

</div>

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
			'id_soci' =>  $_SESSION['id_free'],
			'nom_soci' =>  $_SESSION['prenom']
			));
}


?>

<script>


	$( "#radio_dev" ).on( "click", function() {

		$( "#list_spe" ).prop('disabled', false);

		$( "#php" ).prop('disabled', false);
		$( "#css" ).prop('disabled', false);
		$( "#js" ).prop('disabled', false);

		$( "#c" ).prop('disabled', true);
		$( "#cc" ).prop('disabled', true);
		$( "#java" ).prop('disabled', true);

		$( "#cisco" ).prop('disabled', true);


	});

	$( "#radio_prog" ).on( "click", function() {

		$( "#list_spe" ).prop('disabled', false);
		$( "#c" ).prop('disabled', false);
		$( "#cc" ).prop('disabled', false);
		$( "#java" ).prop('disabled', false);

		$( "#php" ).prop('disabled', true);
		$( "#css" ).prop('disabled', true);
		$( "#js" ).prop('disabled', true);

		$( "#cisco" ).prop('disabled', true);

	});

	$( "#radio_reseau" ).on( "click", function() {

		$( "#list_spe" ).prop('disabled', false);
		$( "#c" ).prop('disabled', true);
		$( "#cc" ).prop('disabled', true);
		$( "#java" ).prop('disabled', true);

		$( "#php" ).prop('disabled', true);
		$( "#css" ).prop('disabled', true);
		$( "#js" ).prop('disabled', true);

		$( "#cisco" ).prop('disabled', false);

	});


	//CONDITION POUR QUE LE BOUTON SUBMIT SOIT ACTIF
	$( "#titre, #description, #competences, #budget, #date_debut, #duree, #lieu, #list_spe").on('keyup change', function() {

		if($("#titre").val() != '' && $("#description").val() != '' && $("#competences").val() != '' && $("#budget").val() != '' && $("#date_debut").val() != '' && $("#duree").val() != '' && $("#lieu").val() != '' && $("#list_spe").val() != 'defaut')
		{
			$( "#submit" ).prop('disabled', false);
		}
	});

</script>

</body>
</html>
