<?php
include_once('co_bdd.php');
session_start();

	if ($_POST['checker2'] == 2) {
	$sql = "DELETE FROM annonces WHERE id_ann = :id_ann";
	$stmt = $bdd->prepare($sql);
	$stmt->bindParam(':id_ann', $_POST['id_annonce'], PDO::PARAM_INT);   
	$stmt->execute();
	$_SESSION['supprimer_mission'] = 1;
	header("location: ../vos.missions.php");
} ?>