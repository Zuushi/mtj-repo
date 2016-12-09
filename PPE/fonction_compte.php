<?php
include_once('includes/co_bdd.php');
include_once('includes/traitement_co_free.php');


//Requete de modification dans la base de données

                      $idses=$_SESSION['id_free'];

if(!empty($_POST['newnom']))
				{
					$uppseudo = $bdd->prepare('UPDATE mbr_free SET nom=:newnom WHERE id_free=:id_free');
					$uppseudo ->execute(array(
					'newnom'=>$_POST['newnom'],
					'id_free'=> $idses ));
				}
if(!empty($_POST['newprenom']))
				{
					$uppseudo = $bdd->prepare('UPDATE mbr_free SET prenom=:newprenom WHERE id_free=:id_free');
					$uppseudo ->execute(array(
					'newprenom'=>$_POST['newprenom'],
					'id_free'=> $idses ));
				}

if(!empty($_POST['newcompetences']))
				{
					$uppseudo = $bdd->prepare('UPDATE mbr_free SET competences=:newcompetences WHERE id_free=:id_free');
					$uppseudo ->execute(array(
					'newcompetences'=>$_POST['newcompetences'],
					'id_free'=> $idses ));
				}
if(!empty($_POST['newsite']))
				{
					$uppseudo = $bdd->prepare('UPDATE mbr_free SET site_web=:newsite WHERE id_free=:id_free');
					$uppseudo ->execute(array(
					'newsite'=>$_POST['newsite'],
					'id_free'=> $idses ));
				}
if(!empty($_POST['newtarif']))
				{
					$uppseudo = $bdd->prepare('UPDATE mbr_free SET tarif=:newtarif WHERE id_free=:id_free');
					$uppseudo ->execute(array(
					'newtarif'=>$_POST['newtarif'],
					'id_free'=> $idses ));
				}
if(!empty($_POST['newlangues']))
				{
					$uppseudo = $bdd->prepare('UPDATE mbr_free SET langues=:newlangues WHERE id_free=:id_free');
					$uppseudo ->execute(array(
					'newlangues'=>$_POST['newlangues'],
					'id_free'=> $idses ));
				}
if(!empty($_POST['newlocalisation']))
				{
					$uppseudo = $bdd->prepare('UPDATE mbr_free SET localisation=:newlocalisation WHERE id_free=:id_free');
					$uppseudo ->execute(array(
					'newlocalisation'=>$_POST['newlocalisation'],
					'id_free'=> $idses ));
				}


header ('location: ./profil.php');


?>


