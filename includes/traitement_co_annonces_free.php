<?php

session_start();

if (!empty($_POST['email']))
{

	//POUR LA TABLE FREELANCE :

	//ON RECUPERE LE MOT DE PASSE CORRESPONDANT AU MAIL ENTRE PAR L'UTILISATEUR DANS LE FORM DE CONNECTION
	$req = $bdd->prepare('SELECT mail, password FROM mbr_free WHERE mail = :mail');
	$req->execute(array(
		'mail' => $_POST['email']
		));

	$donnees = $req->fetch();

	//SI LE MAIL EXISTE EN BDD ON VERIE QUE LE MDP QUI LUI EST ASSOCIE CORRESPOND AU MDP ENTRE PAR L'UTILISATEUR
	//ON UTILISE password_verify POUR VERIFIER LA CORRESPONDANCE ENTRE LE MDP ENTRE ET LE MDP HASHE DANS LA BASE
	if (password_verify($_POST['password'], $donnees['password']))

	{	
		$_SESSION['mail_sess'] = $_POST['email'];
		$_SESSION['type'] = 'freelance';

		header('Location: view_annonces_free.php');      
	}


	//POUR LA TABLE SOCIETY :

	//ON RECUPERE LE MOT DE PASSE CORRESPONDANT AU MAIL ENTRE PAR L'UTILISATEUR DANS LE FORM DE CONNECTION
	$req = $bdd->prepare('SELECT mail, password FROM mbr_society WHERE mail = :mail');
	$req->execute(array(
		'mail' => $_POST['email']
		));

	$donnees = $req->fetch();

	//SI LE MAIL EXISTE EN BDD ON VERIE QUE LE MDP QUI LUI EST ASSOCIE CORRESPOND AU MDP ENTRE PAR L'UTILISATEUR
	//ON UTILISE password_verify POUR VERIFIER LA CORRESPONDANCE ENTRE LE MDP ENTRE ET LE MDP HASHE DANS LA BASE
	if (password_verify($_POST['password'], $donnees['password']))

	{	

		$_SESSION['mail_sess'] = $_POST['email'];
		$_SESSION['type'] = 'societe';

		header('Location: view_annonces_free.php');      
	}

	//SI ON EST RENTRE DANS AUCUNE DES 2 CONDI PRECEDENTES ET QUE DONC AUCUNE SESSION N'A ETE CREEE, REDIRECTION VERS ERROR
	if(empty($_SESSION['mail_sess']))
	{
		header('Location: view_annonces.php?result=err_log');
	}

}

?>