<?php
include_once('includes/co_bdd.php');
	    $req = $bdd->prepare('SELECT password FROM mbr_free WHERE mail = :mail');
        $req->execute(array(
          'mail' => $_SESSION['mail_sess']
          ));

        $donnees = $req->fetch();
          $password = $donnees['password'];
	if (!empty($_POST['profil_free']) AND $_POST['profil_free'] == 'check1' AND password_verify($_POST['password'], $password) AND empty($_POST['npassword']) AND empty($_POST['nvpassword'])) {


		$id = $_SESSION['id'];
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$mail = $_POST['mail'];
		$siret_free = $_POST['siret_free'];
		$photo = $_POST['url'];
		$localisation = $_POST['localisation'];

		$req3= "UPDATE mbr_free SET siret_free=:siret_free, nom=:nom, prenom=:prenom, mail=:mail, photo=:photo, localisation=:localisation WHERE id_free=:id_free";

		$stmt = $bdd->prepare($req3);
		$stmt->bindValue(":siret_free", $siret_free, PDO::PARAM_STR);
	    $stmt->bindValue(":nom", $nom, PDO::PARAM_STR);
	    $stmt->bindValue(":prenom", $prenom, PDO::PARAM_STR);
	    $stmt->bindValue(":mail", $mail, PDO::PARAM_STR);
	    $stmt->bindValue(":photo", $photo, PDO::PARAM_STR);
	    $stmt->bindValue(":localisation", $localisation, PDO::PARAM_STR);
	    $stmt->bindValue(":id_free", $id, PDO::PARAM_INT);
	    $stmt->execute();
 ?> 		
 			<div class="alert alert-success">
				<p>Mise à jour du profil réussi !</p>
			</div>
<?php } 


	if (!empty($_POST['profil_free']) AND $_POST['profil_free'] == 'check1' AND !password_verify($_POST['password'], $password)) { ?>
			<div class="alert alert-danger">
				<p>Erreur de saisie du mot de passe !</p>
			</div>
	<?php }
	if (!empty($_POST['profil_free']) AND $_POST['profil_free'] == 'check1' AND password_verify($_POST['password'], $password) AND !empty($_POST['npassword']) AND !empty($_POST['nvpassword'])) {
		if ($_POST['npassword'] == $_POST['nvpassword']) {
			$newpass = password_hash($_POST['npassword'], PASSWORD_BCRYPT);
					$req3= "UPDATE mbr_free SET password=:password WHERE id_free=:id_free";

			$stmt = $bdd->prepare($req3);
			$stmt->bindValue(":password", $newpass, PDO::PARAM_STR);
		    $stmt->bindValue(":id_free", $id, PDO::PARAM_INT);
		    $stmt->execute();
		}
 ?> 		
 			<div class="alert alert-success">
				<p>Mise à jour du password réussi !</p>
			</div>
<?php } if (!empty($_POST['profil_free']) AND $_POST['profil_free'] == 'check1' AND $_POST['npassword'] != $_POST['nvpassword'] AND !empty($_POST['npassword']) AND !empty($_POST['nvpassword'])) { ?>
			<div class="alert alert-danger">
				<p>Les deux mots de passe ne correspondent pas !</p>
			</div>
	<?php }

	if (!empty($_POST['profil_free']) AND $_POST['profil_free'] == 'check2' AND password_verify($_POST['cpassword'], $password)) {


		$id = $_SESSION['id'];
		$site_web = $_POST['site'];
		$langues = $_POST['langues'];
		$tarif = intval($_POST['tarif']);
		$competences = $_POST['competences'];

		$req3= "UPDATE mbr_free SET site_web=:site_web, tarif=:tarif, langues=:langues, competences=:competences WHERE id_free=:id_free";

		$stmt = $bdd->prepare($req3);
		$stmt->bindValue(":site_web", $site_web, PDO::PARAM_STR);
	    $stmt->bindValue(":langues", $langues, PDO::PARAM_STR);
	    $stmt->bindValue(":tarif", $tarif, PDO::PARAM_INT);
	    $stmt->bindValue(":competences", $competences, PDO::PARAM_STR);
	    $stmt->bindValue(":id_free", $id, PDO::PARAM_INT);
	    $stmt->execute();
 ?> 		
 			<div class="alert alert-success">
				<p>Mise à jour des compétences réussi !</p>
			</div>
<?php } if (!empty($_POST['profil_free']) AND $_POST['profil_free'] == 'check2' AND !password_verify($_POST['cpassword'], $password)) {?>
		<div class="alert alert-danger">
			<p>Erreur de saisie mot de passe !</p>
		</div>
<?php }
?>
