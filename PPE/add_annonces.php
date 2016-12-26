<?php
session_start();
include_once('includes/co_bdd.php'); 

// SI UTILISATEUR NON CONNECTE ON REDIRIGE
if (!isset($_SESSION['id'])) {
        header("location: index.php");
        }
if ($_SESSION['type'] == 'freelance') {
        // ON INCLUT LE FICHIER CONTENANT TOUTE LES VARIABLES $_SESSION FREELANCE
        include_once('session/session_freelance.php');
        header("location: index.php");
        } else {
        // ON INCLUT LE FICHIER CONTENANT TOUTE LES VARIABLES $_SESSION SOCIETE
        include_once('session/session_societe.php');
        }
?>

<!DOCTYPE html>
<html lang="en">
<?php 
  include_once('includes/header.php'); 
?>
<head>
	<style type="text/css">
		#c, #cc, #java, #php, #css, #js, #cisco {font-weight: bold;}
		#c[disabled ], #cc[disabled ], #java[disabled ], #php[disabled ], #css[disabled ], #js[disabled ], #cisco[disabled ] {color: #D1D1D1; font-weight: normal;}
	</style>
</head>

<script type="text/javascript">
	 function deco () {
      window.location= "deconnexion/deco.php";
    }
</script>

<body class="my_background bg-color-inscription">

  <?php
  //BARRE MENU UTILISATEUR CONNECTE
  if (!empty($_SESSION['mail_sess'])) {
       if ($_SESSION['type'] == 'freelance') {
        // ON INCLUT LE FICHIER CONTENANT TOUTE LES VARIABLES $_SESSION FREELANCE
        include_once('session/session_freelance.php');
        } else {
        // ON INCLUT LE FICHIER CONTENANT TOUTE LES VARIABLES $_SESSION SOCIETE
        include_once('session/session_societe.php');
        }  

     //BARRE MENU UTILISATEUR CONNECTE
        include_once('navbar\navbar_user_connecte.php');
     }
     else {
     //BARRE MENU UTILISATEUR NON CONNECTE
        include_once('navbar\navbar_user_non_connecte.php');
     }
     //FORMULAIRE DE CONNEXION QUI S'AFFICHE LORS DE LA CONNEXION
     include_once('includes\formulaire_connexion.php');
  ?>

<div class="container mise-en-page">
<center>

	<div style="background-color: #337ab7;color: white;">
      <span>
        <center><h1>Ajouter une MISSION :</h1></center>
      </span>
    </div>
    <?php include_once('includes\action.add_annonces.php'); ?>
	<form method="post" action="">
	<div class="row">
	  <div class="col-md-offset-2 col-md-8">
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
	  </div>
	  <div class="col-md-offset-2 col-md-8">
		<div class="form-group">
			<select id="list_spe" name="list_spe" style="" class="form-control" disabled>

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
	  </div>
	</div>
	<div class="row">
	  <div class="col-md-offset-2 col-md-8">
		<div class="form-group">
			
			<input style="" type="text" class="form-control" id="titre" name="titre" placeholder="Titre de l'annonce">
		</div>
		<div class="form-group">
			<textarea style="" class="form-control" id="description" name="description" rows="3" placeholder="Description de l'annonce"></textarea>
		</div>
		<div class="form-group">
			<textarea style="" class="form-control" id="competences" name="competences" rows="3" placeholder="Compétences requises"></textarea>
		</div>
		<div class="form-group">

			<input style="" type="text" class="form-control" id="budget" name="budget" placeholder="Budget (en €)">
		</div>

		<div class="form-group">
			<label>Date de début de mission :</label><br>
			<input style="" type="date" class="form-control" id="date_debut" name="date_debut" placeholder="date de début">
		</div>

		<div class="form-group">

			<input style="" type="text" class="form-control" id="duree" name="duree" placeholder="Durée">
		</div>

		<div class="form-group">

			<input style="" type="text" class="form-control" id="lieu" name="lieu" placeholder="Lieu">
		</div>
	</div>
  </div>
		<button style="" id="submit" type="submit" disabled="true" class="btn btn-primary col-md-offset-2 col-md-8">Poster</button><br>&nbsp;
	</form>
</center>
</div>

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

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
