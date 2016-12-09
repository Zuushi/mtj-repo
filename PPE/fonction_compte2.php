<?php
include_once('includes/co_bdd.php');
include_once('includes/traitement_co_free.php');

$idses=$_SESSION['id_free'];

if(!empty($_POST['newmail']))
				{
					$uppseudo = $bdd->prepare('UPDATE mbr_free SET mail=:newmail WHERE id_free=:id_free');
					$uppseudo ->execute(array(
					'newmail'=>$_POST['newmail'],
					'id_free'=> $idses ));
				}

if(!empty($_POST['newpassword']))
				{

	$secure_pass = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);
				
					$uppseudo = $bdd->prepare('UPDATE mbr_free SET password=:newpassword WHERE id_free=:id_free');
					$uppseudo ->execute(array(
					'newpassword' =>  $secure_pass,
					'id_free'=> $idses ));
				}
header ('location: ./deco.php');

?>