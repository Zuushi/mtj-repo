<?php
include_once('includes/co_bdd.php');
	    $req = $bdd->prepare('SELECT password FROM mbr_society WHERE mail = :mail');
        $req->execute(array(
          'mail' => $_SESSION['mail_sess']
          ));

        $donnees = $req->fetch();
          $password = $donnees['password'];

	if (!empty($_POST['profil_societe']) AND $_POST['profil_societe'] == 'check3' AND password_verify($_POST['password_societe'], $password) AND empty($_POST['npassword_societe']) AND empty($_POST['nvpassword_societe'])) {


		$id = $_SESSION['id'];
		$raison_sociale = $_POST['raison_sociale'];
		$siret_societe = $_POST['siret_societe'];
		$mail = $_POST['mail_societe'];
		$logo = $_POST['url2'];
		$siege_social = $_POST['siege_social'];
		$recruteur = $_POST['recruteur'];

		$req3= "UPDATE mbr_society SET raison_sociale=:raison_sociale, siret=:siret, mail=:mail, logo=:logo, siege_social=:siege_social, recruteur=:recruteur WHERE id_soc=:id_soc";

		$stmt = $bdd->prepare($req3);
		$stmt->bindValue(":raison_sociale", $raison_sociale, PDO::PARAM_STR);
		$stmt->bindValue(":siret", $siret_societe, PDO::PARAM_STR);
		$stmt->bindValue(":mail", $mail, PDO::PARAM_STR);
	    $stmt->bindValue(":logo", $logo, PDO::PARAM_STR);
	    $stmt->bindValue(":siege_social", $siege_social, PDO::PARAM_STR);
	    $stmt->bindValue(":recruteur", $recruteur, PDO::PARAM_STR);
	    $stmt->bindValue(":id_soc", $id, PDO::PARAM_INT);
	    $stmt->execute();
 ?> 		
 			<div class="alert alert-success">
				<p>Mise à jour du profil réussi !</p>
			</div>
<?php } 


	if (!empty($_POST['profil_societe']) AND $_POST['profil_societe'] == 'check3' AND !password_verify($_POST['password_societe'], $password)) { ?>
			<div class="alert alert-danger">
				<p>Erreur de saisie du mot de passe !</p>
			</div>	
	<?php }

	if (!empty($_POST['profil_societe']) AND $_POST['profil_societe'] == 'check3' AND password_verify($_POST['password_societe'], $password) AND !empty($_POST['npassword_societe']) AND !empty($_POST['nvpassword_societe'])) {
		if ($_POST['npassword_societe'] == $_POST['nvpassword_societe']) {
			$id = $_SESSION['id'];

			$newpass = password_hash($_POST['npassword_societe'], PASSWORD_BCRYPT);
			$req3= "UPDATE mbr_society SET password=:password WHERE id_soc=:id_soc";

			$stmt = $bdd->prepare($req3);
			$stmt->bindValue(":password", $newpass, PDO::PARAM_STR);
		    $stmt->bindValue(":id_soc", $id, PDO::PARAM_INT);
		    $stmt->execute();
 ?> 		
 			<div class="alert alert-success">
				<p>Mise à jour du mot de passe réussi !</p>
			</div> <?php } ?>

<?php } if (!empty($_POST['profil_societe']) AND $_POST['profil_societe'] == 'check3' AND $_POST['npassword_societe'] != $_POST['nvpassword_societe'] AND !empty($_POST['npassword_societe']) AND !empty($_POST['nvpassword_societe'])) { ?>
			<div class="alert alert-danger">
				<p>Les deux mots de passe ne correspondent pas !</p>
			</div>
	<?php }
		else if (!empty($_POST['profil_societe']) AND $_POST['profil_societe'] == 'check3' AND password_verify($_POST['password_societe'], $password) AND $_POST['npassword_societe'] != $_POST['nvpassword_societe']) { ?>

			<div class="alert alert-danger">
				<p>Les deux mots de passe ne correspondent pas !</p>
			</div>
	<?php }



//
	//
	//
	//	 	REQUETE POUR MODIFIER LA PARTIE CARACTERISTIQUES SOCIETE
	//
	//
//


	if (!empty($_POST['profil_societe']) AND $_POST['profil_societe'] == 'check4' AND password_verify($_POST['cpassword_societe'], $password)) {


		$id = $_SESSION['id'];
		$site_web = $_POST['site_societe'];
		$capital = intval($_POST['capital']);
		$caracteristiques = $_POST['caracteristiques'];

		$req3= "UPDATE mbr_society SET site_web=:site_web, capital=:capital, caracteristiques=:caracteristiques WHERE id_soc=:id_soc";

		$stmt = $bdd->prepare($req3);
		$stmt->bindValue(":capital", $capital, PDO::PARAM_INT);
		$stmt->bindValue(":site_web", $site_web, PDO::PARAM_STR);
	    $stmt->bindValue(":caracteristiques", $caracteristiques, PDO::PARAM_STR);
	    $stmt->bindValue(":id_soc", $id, PDO::PARAM_INT);
	    $stmt->execute();
 ?> 		
 			<div class="alert alert-success">
				<p>Mise à jour des caractéristiques réussi !</p>
			</div>
<?php } if (!empty($_POST['profil_societe']) AND $_POST['profil_societe'] == 'check4' AND !password_verify($_POST['cpassword_societe'], $password)) {?>
		<div class="alert alert-danger">
			<p>Erreur de saisie mot de passe !</p>
		</div>
<?php }

?>
