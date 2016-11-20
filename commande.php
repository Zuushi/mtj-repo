<?php 

session_start(); 

include_once('./includes/co_bdd.php');

if (isset($_SESSION['ident_sess']) AND isset($_SESSION['pass_sess']))

{

	
include_once('./includes/header.php');

include_once('./includes/nav.php');



		if (!empty($_POST)) {
			

			$error4 = array();

			if (empty($_POST['cb']))

			{
				$error4['err_no_post_cb'] = 'Veuillez entrer un numéro de carte bleue.';
			}


			
			$req = $bdd->prepare('SELECT cb FROM client WHERE nomclient = :nomclient AND cb = :cb');
			$req->execute(array(
				'nomclient' => $_SESSION['ident_sess'],
				'cb' => $_POST['cb']
				));

			$donnees = $req->fetch();


			if (empty($donnees['cb']))

			{
				$error4['err_num_cb'] = 'Votre numéro de carte bleue n\'est pas valide.';
			}


			if (empty($error4)) {

				$req = $bdd->prepare('SELECT SUM(prix_total) FROM panier WHERE nom_client = :nom_client');
				$req->execute(array(
					'nom_client' => $_SESSION['ident_sess']));

				$donnees = $req->fetch();


				header('Location: valid_command.php?tot=' .$donnees['SUM(prix_total)']);      
			}



		}

			
	
					


		if (!empty($_GET['nom_produit'])) {




			$prix_tot = htmlspecialchars($_GET['prix']) * htmlspecialchars($_GET['quantite']);



			$req = $bdd->prepare('INSERT INTO panier(nom_produit, quantite, prix_total, nom_client) VALUES(:nom_produit, :quantite, :prix_total, :nom_client)');
			$req->execute(array(

				'nom_produit' => $_GET['nom_produit'],
				'quantite' => $_GET['quantite'],
				'prix_total' => $prix_tot,
				'nom_client' => $_SESSION['ident_sess']
				));


			header('Location: commande.php');
		}

		?>

		<div class="container-fluid" id="div1">

			<div style="height: 100vh;" class="container" id="corps_centre">

				<center><h3>Panier</h3></center><br />

				<?php

				if (!empty($error4)) {

					?><div class="alert alert-danger"> Erreur :</br> 

					<ul>

						<?php

						foreach ($error4 as $key4) {

							echo '<li><p style="color: red;">' .$key4. '</p></li>' ;
						}
						?> </ul></div> <?php
					}





					?>



					<table border="1px;" style="margin : auto; width: 300px;">

						<tr>
							<td style="padding-right: 5px; padding-left: 5px;"><center><p style="font-weight: bold;">Produit</p></center></td>
							<td style="padding-right: 5px; padding-left: 5px;"><center><p style="font-weight: bold;">Quantité</p></center></td>
							<td style="padding-right: 5px; padding-left: 5px;"><center><p style="font-weight: bold;">Prix</p></center></td>
						</tr>
						<?php
						$req = $bdd->prepare('SELECT nom_produit, quantite, prix_total, id_panier FROM panier WHERE nom_client = :nom_client');
						$req->execute(array(
							'nom_client' => $_SESSION['ident_sess']));


						while($donnees = $req->fetch())
						{
							echo '<tr>
							<td style="padding-right: 5px; padding-left: 5px;"><center>' .$donnees['nom_produit']. '</center></td>
							<td style="padding-right: 5px; padding-left: 5px;">'; ?> 
								<form method="post" action="<?php echo 'update_qt.php?id_panier=' .$donnees['id_panier'] ?>" >
									<select name="select_quant" id="select_quant" class="form-control" onchange="this.form.submit()"><option><?php echo $donnees['quantite']; ?></option>
										<?php 
										for ($i=1; $i <21 ; $i++) { 

											?>
											<option><?php echo $i; ?></option>
											<?php } ?>
										</select></form> <?php  echo '</td>
										<td style="padding-right: 5px; padding-left: 5px;"><center>' .$donnees['prix_total']. '€</center></td>
									</tr>';

								}

								$req = $bdd->prepare('SELECT SUM(prix_total) FROM panier WHERE nom_client = :nom_client');
								$req->execute(array(
									'nom_client' => $_SESSION['ident_sess']));

								$donnees = $req->fetch();

								?>
								<tr>
									<td style="border: none;"></td>
									<td style="border: none;"></td>
									<td style="font-weight: bold;"><center>
										Total : <?php echo $donnees['SUM(prix_total)']. '€'; ?></center></td>
									</tr>
								</table>

								<?php 



								?>

								<br />

								<center>
<!-- 							<a href=""><button style="width: 300px;" class="btn btn-success">Commander</button>
-->

<!-- Button trigger modal -->
<button type="button" style="width: 300px;" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal2">
	Commander								</button>

	<!-- Modal -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Entrez votre numéro de carte bleue afin de finaliser la commande :</h4>
				</div>
				<div class="modal-body">

					<form method="post" action="">
						<div class="form-group">
							<label for="exampleInputEmail1">N° de Carte bleue</label>
							<input name="cb" type="password" class="form-control" id="exampleInputEmail1" placeholder="N° de Carte bleue" >
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
						<button type="submit" class="btn btn-primary">Payer</button>
					</form>
				</div>
			</div>
		</div>
	</div>



	<br /><br />
	<a href="catalogue.php"><button class="btn btn-primary">Retour au catalogue</button></a></center>




	<?php
}else
{
	echo 'Veuilez vous identifier.';
}

?>

</div>
</div>




</body>
</html>


