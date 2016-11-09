<?php
session_start();

if (!empty($_POST))
{


	$req = $bdd->prepare('SELECT mail, password FROM mbr_free WHERE mail = :mail');
	$req->execute(array(
		'mail' => $_POST['email']
		));

	$donnees = $req->fetch();

	echo $donnees['password'];
	echo $_POST['password'];


	if (password_verify($_POST['password'], $donnees['password']))

	{	


		$_SESSION['mail_sess'] = $_POST['email'];

		header('Location: index.php');      
	}

	else
	{
	 	 
	 	header('Location: index.php?result=err_log');
 	
	}

}
?>