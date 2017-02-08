<?php
include_once('includes/co_bdd.php');


//SI DES DONNEES ONT ETE POSTE ON COMMENCE LE TRAITEMENT 
if (!empty($_POST['post_society']))

{

	//CREATION D'UN TABLEAU CONTENANT LES EVENTUELLES ERREURS
	$error2 = array();


	//SI UN OU PLUSIEURS CHAMPS DU FORMULAIRE EST VIDE
	if (empty($_POST['raison_sociale']) OR empty($_POST['siret']) OR empty($_POST['email_societe']) OR empty($_POST['vemail_societe']) OR empty($_POST['password_societe']) OR empty($_POST['vpassword_societe']))
	{
		$error2['champs_vide'] = 'Veuillez remplir tous les champs du formulaire.';
	}

	//SI LES DEUX PASSWORDS NE CORRESPONDENT PAS 
	if ($_POST['password_societe'] != $_POST['vpassword_societe'])
	{
		$error2['pass_no_corres'] = 'Les deux mots de passe ne correspondent pas.';
	}

	//SI LES DEUX MAILS NE CORRESPONDENT PAS 
	if ($_POST['email_societe'] != $_POST['vemail_societe'])
	{
		$error2['pass_no_corres'] = 'Les deux mots de passe ne correspondent pas.';
	}

	//VERIFICATION SI FORMAT MAIL CORRECT
/*	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false)
	{
		$error['format_mail'] = 'Veuillez entrer une adresse mail valide.';
	}*/

	//VERIFICATION SI MAIL EXISTE DEJA ON RETOURNE UNE ERREUR
	$req = $bdd->prepare('SELECT mail FROM mbr_society WHERE mail = :mail');
	$req->execute(array(
		'mail' => $_POST['email_societe']
		));

	$donnees = $req->fetch();

	if (!empty($donnees['mail']))
	{
		$error2['mail_exist'] = 'Cette adresse mail existe déjà.';
	}


	//--------------------------------------------------------------------------------------------
	//SI LE TABLEAU D'ERREURS EST VIDE ON INSCRIT LES INFORMATIONS DU FORMULAIRE DANS LA BDD
	if (empty($error2)) {

		//CRYPTAGE MDP
		$secure_pass = password_hash($_POST['password_societe'], PASSWORD_BCRYPT);


		//INSERTION BDD
		$req = $bdd->prepare('INSERT INTO mbr_society(raison_sociale, siret, mail, password, date_inscr) VALUES(:raison_sociale, :siret, :mail, :password, CURDATE()
			)');
		$req->execute(array(

			'raison_sociale' => $_POST['raison_sociale'],
			'siret' =>  $_POST['siret'],
			'mail' =>  $_POST['email_societe'],
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
		if (!empty($error2)) {

			?><br /><br /><div class="alert alert-danger"> Erreur :</br> 

			<ul>

				<?php

				foreach ($error2 as $key2) {

					echo '<li><p style="color: red;">' .$key2. '</p></li>' ;
				}
				?> </ul>

			</div> <?php

		}//FIN SI !EMPTY[ERROR]

	}//FIN SI !EMPTY[POST]

	?>

