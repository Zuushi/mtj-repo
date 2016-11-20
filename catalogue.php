<?php 

session_start(); 

include_once('./includes/co_bdd.php');


if (isset($_SESSION['ident_sess']) AND isset($_SESSION['pass_sess']))

{

	include_once('./includes/header.php');

	include_once('./includes/nav.php');

	?>



	<?php

	$reponse = $bdd->query('SELECT nomproduit, prix FROM produit');

	$donnees = $reponse->fetch();


	if (!empty($_POST))

	{ 

		$error3 = array();

		if (empty($_POST['quantite']))

		{
			$error3['err_no_post'] = 'Veuillez entrer une quantité.';
		}


		if (!ctype_digit($_POST['quantite']))

		{
			$error3['err_no_number'] = 'Veuillez entrer une quantité valide.';
		}


		if (empty($error3)) {

			header('Location: commande.php?nom_produit=' .$_POST['nom_prod']. '&prix=' .$_POST['prix_prod']. '&quantite=' .$_POST['quantite']);      
		}



	}

	?>

	<div class="container-fluid" id="div1">

		<div class="container" id="corps_centre">




			

			<center><h2 style="color: black;" id="titre1">Catalogue</h2>
				<h4 style="color: black;" id="titre2">Faites votre choix parmi les produits de notre catalogue :</h4>

				<form method="get" action="">
					<p>
						<label for="pays">Catégories</label><br />
						<select name="catego" id="">
							<option value="all">TOUTES LES TV</option>
							<option value="p_ecran">TV PETIT ECRAN</option>
							<option value="g_ecran">TV GRAND ECRAN</option>
							<option value="hd">TV HD</option>


						</select>
					</p>
					<button type="submit" class="btn-primary">Valider</button>
				</form></center>
				<br />

				<?php 

				if (!empty($_GET['catego']))
				{

					if($_GET['catego'] == 'all')
					{

						
						echo 'Toutes les TV.<br />';

						
						$reponse = $bdd->query('SELECT nomproduit, prix, img FROM produit ORDER BY prix ASC');

						while ($donnees = $reponse->fetch())
						{
							echo '<div id="div_produits">' .$donnees['nomproduit']. '<br />Prix: ' .$donnees['prix']. '€<br /><br /><img src=" ' .$donnees['img']. '" ></img><br />';

							?> <br />

							<form method="post" action="">

								<div class="form-group">

									<input style="width: 200px;" type="text" class="form-control" placeholder="Entrez la quantite" name="quantite"> 

									<input style="width: 200px;" type="hidden" class="form-control" placeholder="Entrez la quantite" name="prix_prod" value="<?php echo $donnees['prix']; ?>">

									<input style="width: 200px;" type="hidden" class="form-control" placeholder="Entrez la quantite" name="nom_prod" value="<?php echo $donnees['nomproduit']; ?>">
								</div>

								<button style="width: 200px;" type="submit" class="btn btn-primary">Valider</button>

							</form><br />
						</div>

						<?php


					}


				}


				if($_GET['catego'] == 'p_ecran')
				{

					$reponse2 = $bdd->query('SELECT nom, description FROM categories WHERE code="1"');
					$donnees2 = $reponse2->fetch();
					echo $donnees2['nom']; ?> <br /> <?php
					echo $donnees2['description']; ?> <br /><br /> <?php


					$reponse = $bdd->query('SELECT nomproduit, prix, img FROM produit WHERE ecran ="1" ORDER BY prix ASC');

					while ($donnees = $reponse->fetch())
					{
						echo '<div id="div_produits">' .$donnees['nomproduit']. '<br />Prix: ' .$donnees['prix']. '€<br /><br /><img src=" ' .$donnees['img']. '" ></img><br />';

						?> <br />

						<form method="post" action="">

							<div class="form-group">

								<input style="width: 200px;" type="text" class="form-control" placeholder="Entrez la quantite" name="quantite"> 

								<input style="width: 200px;" type="hidden" class="form-control" placeholder="Entrez la quantite" name="prix_prod" value="<?php echo $donnees['prix']; ?>">

								<input style="width: 200px;" type="hidden" class="form-control" placeholder="Entrez la quantite" name="nom_prod" value="<?php echo $donnees['nomproduit']; ?>">
							</div>

							<button style="width: 200px;" type="submit" class="btn btn-primary">Valider</button>

						</form><br />
					</div>

					<?php


				}

			}


				if($_GET['catego'] == 'g_ecran')
				{

					$reponse2 = $bdd->query('SELECT nom, description FROM categories WHERE code="2"');
					$donnees2 = $reponse2->fetch();
					echo $donnees2['nom']; ?> <br /> <?php
					echo $donnees2['description']; ?> <br /><br /> <?php



					$reponse = $bdd->query('SELECT nomproduit, prix, img FROM produit WHERE ecran ="2" ORDER BY prix ASC');

					while ($donnees = $reponse->fetch())
					{
						echo '<div id="div_produits">' .$donnees['nomproduit']. '<br />Prix: ' .$donnees['prix']. '€<br /><br /><img src=" ' .$donnees['img']. '" ></img><br />';

						?> <br />

						<form method="post" action="">

							<div class="form-group">

								<input style="width: 200px;" type="text" class="form-control" placeholder="Entrez la quantite" name="quantite"> 

								<input style="width: 200px;" type="hidden" class="form-control" placeholder="Entrez la quantite" name="prix_prod" value="<?php echo $donnees['prix']; ?>">

								<input style="width: 200px;" type="hidden" class="form-control" placeholder="Entrez la quantite" name="nom_prod" value="<?php echo $donnees['nomproduit']; ?>">
							</div>

							<button style="width: 200px;" type="submit" class="btn btn-primary">Valider</button>

						</form><br />
					</div>

					<?php


				}

			}


				if($_GET['catego'] == 'hd')
				{
					$reponse2 = $bdd->query('SELECT nom, description FROM categories WHERE code="3"');
					$donnees2 = $reponse2->fetch();
					echo $donnees2['nom']; ?> <br /> <?php
					echo $donnees2['description']; ?> <br /><br /> <?php



					$reponse = $bdd->query('SELECT nomproduit, prix, img FROM produit WHERE hd ="3" ORDER BY prix ASC');

					while ($donnees = $reponse->fetch())
					{
						echo '<div id="div_produits">' .$donnees['nomproduit']. '<br />Prix: ' .$donnees['prix']. '€<br /><br /><img src=" ' .$donnees['img']. '" ></img><br />';

						?> <br />

						<form method="post" action="">

							<div class="form-group">

								<input style="width: 200px;" type="text" class="form-control" placeholder="Entrez la quantite" name="quantite"> 

								<input style="width: 200px;" type="hidden" class="form-control" placeholder="Entrez la quantite" name="prix_prod" value="<?php echo $donnees['prix']; ?>">

								<input style="width: 200px;" type="hidden" class="form-control" placeholder="Entrez la quantite" name="nom_prod" value="<?php echo $donnees['nomproduit']; ?>">
							</div>

							<button style="width: 200px;" type="submit" class="btn btn-primary">Valider</button>

						</form><br />
					</div>

					<?php


				}

			}

		}
		?>





		<?php



		if (isset($_GET['command']))
		{
			echo '<center><div class="alert alert-success">Paiement réussi, votre commande a bien été prise en compte.</div></center>';?> <br />
			<?php	
		} 

		if (empty($_GET['catego']))
		{

			$reponse = $bdd->query('SELECT nomproduit, prix, img FROM produit ORDER BY prix ASC');

			while ($donnees = $reponse->fetch())
			{
				echo '<div id="div_produits">' .$donnees['nomproduit']. '<br />Prix: ' .$donnees['prix']. '€<br /><br /><img src=" ' .$donnees['img']. '" ></img><br />';

				?> <br />

				<form method="post" action="">

					<div class="form-group">

						<input style="width: 200px;" type="text" class="form-control" placeholder="Entrez la quantite" name="quantite"> 

						<input style="width: 200px;" type="hidden" class="form-control" placeholder="Entrez la quantite" name="prix_prod" value="<?php echo $donnees['prix']; ?>">

						<input style="width: 200px;" type="hidden" class="form-control" placeholder="Entrez la quantite" name="nom_prod" value="<?php echo $donnees['nomproduit']; ?>">
					</div>

					<button style="width: 200px;" type="submit" class="btn btn-primary">Valider</button>

				</form><br />

				<?php

				if (!empty($error3)) {

					?><div class="alert alert-danger"> Erreur :</br> 

					<ul>

						<?php

						foreach ($error3 as $key3) {

							echo '<li><p style="color: red;">' .$key3. '</p></li>' ;
						}
						?> </ul></div> <?php
					}

					?></div><br /><?php

				}



				?>

			</div>

			<?php	}		
		}
		else
		{ 



			include_once('/includes/header.php');

			include_once('/includes/nav2.php');
			?>


			<div class="container-fluid" id="div1">

				<div class="container" id="corps_centre">

					<center><h2 style="color: black;" id="titre1">Catalogue</h2>
						<h4 style="color: black;" id="titre2">Faites votre choix parmi les produits de notre catalogue :</h4></center>




						<?php
						$reponse = $bdd->query('SELECT nomproduit, prix, img FROM produit ORDER BY prix ASC');

						while ($donnees = $reponse->fetch())
						{
							echo '<div id="div_produits">' .$donnees['nomproduit']. '<br />Prix: ' .$donnees['prix']. '€<br /><br /><img src=" ' .$donnees['img']. '" ></img><br />';
							?> <br />


							<br />
							<a href="index.php"><p>Créez un compte afin de passer commande.</p></a>
						</div><br />
						<?php
					}
				}

				?>
			</body>
			</html>