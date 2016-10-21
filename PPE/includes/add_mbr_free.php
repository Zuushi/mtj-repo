<?php
include_once('includes/co_bdd.php');


//SI DES DONNEES ONT ETE POSTE ON COMMENCE LE TRAITEMENT 
if (!empty($_POST))

{

	//CREATION D'UN TABLEAU CONTENANT LES EVENTUELLES ERREURS
	$error = array();


	//SI UN OU PLUSIEURS CHAMPS DU FORMULAIRE EST VIDE
	if (empty($_POST['nom']) OR empty($_POST['prenom']) OR empty($_POST['email']) OR empty($_POST['v_email']) OR empty($_POST['password']) OR empty($_POST['v_password']))
	{
		$error['champs_vide'] = 'Veuillez remplir tous les champs du formulaire.';
	}

	//SI LES DEUX PASSWORDS NE CORRESPONDENT PAS 
	if ($_POST['password'] != $_POST['v_password'])
	{
		$error['pass_no_corres'] = 'Les deux mots de passe ne correspondent pas.';
	}

	//SI LES DEUX MAILS NE CORRESPONDENT PAS 
	if ($_POST['email'] != $_POST['v_email'])
	{
		$error['pass_no_corres'] = 'Les deux mots de passe ne correspondent pas.';
	}

	//VERIFICATION SI FORMAT MAIL CORRECT
	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false)
	{
		$error['format_mail'] = 'Veuillez entrer une adresse mail valide.';
	}

	//VERIFICATION SI MAIL EXISTE DEJA ON RETOURNE UNE ERREUR
	$req = $bdd->prepare('SELECT mail FROM mbr_free WHERE mail = :mail');
	$req->execute(array(
		'mail' => $_POST['email']
		));

	$donnees = $req->fetch();

	if (!empty($donnees['mail']))
	{
		$error['mail_exist'] = 'Cette adresse mail existe déjà.';
	}

	//SI LES CHAMPS NOM OU PRENOM NE SONT PAS DES CARACTERES ON RETOURNE UNE ERREUR
	if (!ctype_alpha($_POST['nom']) OR !ctype_alpha($_POST['prenom']))
	{
		$error['format_nom'] = 'Veuillez entrer un nom et prenom valide.';
	}

	//--------------------------------------------------------------------------------------------
	//SI LE TABLEAU D'ERREURS EST VIDE ON INSCRIT LES INFORMATIONS DU FORMULAIRE DANS LA BDD
	if (empty($error)) {

		//CRYPTAGE MDP
		$secure_pass = crypt($_POST['password']);

		//INSERTION BDD
		$req = $bdd->prepare('INSERT INTO mbr_free(nom, prenom, mail, password, date_inscr) VALUES(:nom, :prenom, :mail, :password, CURDATE()
			)');
		$req->execute(array(

			'nom' => $_POST['nom'],
			'prenom' =>  $_POST['prenom'],
			'mail' =>  $_POST['email'],
			'password' =>  $secure_pass
			));

			?> 
			<br /><br />

			<div class="alert alert-success">
				<p>Inscription réussie ! Connectez-vous dès maintenant !</p>
			</div>

			<?php

		}//FIN SI EMPTY[ERROR]

		//--------------------------------------------------------------------------------------------
		//SI IL Y A UNE OU PLUSIEURS ERREUR(S) DANS LE TABLEAU ON LES AFFICHE
		if (!empty($error)) {

			?><br /><br /><div class="alert alert-danger"> Erreur :</br> 

			<ul>

				<?php

				foreach ($error as $key) {

					echo '<li><p style="color: red;">' .$key. '</p></li>' ;
				}
				?> </ul>

			</div> <?php

		}//FIN SI !EMPTY[ERROR]

	}//FIN SI !EMPTY[POST]

	?>

	<script>

//SCRIPT COULEURS VERIF MAIL

$( "#v_email" ).keyup(function() {

	if(!$("#v_email").val())
	{

		$( "#v_email" ).css("background-color", "white");

	}

	else
	{
		if($("#v_email").val() == $("#email").val())
		{
			$( "#v_email" ).css({'background-color' : '#91C091', 'color' : 'white'});
		}
		else
		{
			$( "#v_email" ).css({'background-color' : '#E25E5E', 'color' : 'white'});
		}
	}

});


//SCRIPT COULEURS VERIF PASS

$( "#v_password" ).keyup(function() {

	if(!$("#v_password").val())
	{

		$( "#v_password" ).css("background-color", "white");

	}

	else
	{
		if($("#v_password").val() == $("#password").val())
		{
			$( "#v_password" ).css({'background-color' : '#91C091', 'color' : 'white'});
		}
		else
		{
			$( "#v_password" ).css({'background-color' : '#E25E5E', 'color' : 'white'});
		}
	}

});


//SCRIPT COULEURS NOM DOIT ETRE UNE CHAINE DE CARACTERE

$( "#nom" ).keyup(function() {

	if(!$("#nom").val())
	{

		$( "#nom" ).css("background-color", "white");

	}

	else
	{
		if(jQuery.type( $( "#nom" ) ) !== "string")
		{
			$( "#nom" ).css({'background-color' : '#91C091', 'color' : 'white'});
		}
		else
		{
			$( "#nom" ).css({'background-color' : '#E25E5E', 'color' : 'white'});
		}
	}

});


</script>