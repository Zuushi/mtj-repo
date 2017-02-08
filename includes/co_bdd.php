<?php
//A modifier si vous n'utilisez pas Mamp
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=ppe_freelance;charset=utf8', 'root', '');
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}
