<?php
include_once('includes/co_bdd.php');
include_once('includes/traitement_co_free.php');



 if (!empty($_SESSION['mail_sess'])) 

      {

        $req = $bdd->prepare('SELECT * FROM mbr_free WHERE mail = :mail');
        $req->execute(array(
          'mail' => $_SESSION['mail_sess']
          ));

        while ($donnees = $req->fetch())
                     {  
        $_SESSION['prenom'] = $donnees['prenom'];
        $_SESSION['id_free'] = $donnees['id_free'];
            

		echo ' 	<div class="container">
					<div class="row">
  						<div class="col-md-8">
  							<form method="post" action="" enctype="multipart/form-data">
								<div class=" style="margin-left=50px;">
									<img src="img/perso1.png" class="img-rounded" style=\'height:150px; width:150px;\'><br />
									<label for="icone">Icône du fichier (JPG, PNG ou GIF | max. 1 MO) :</label><br />
									<input type="hidden" name="MAX_FILE_SIZE" value="1048576" /><br />
									<input type="file" name="chimg" value="Chargez une image" /><br />
									<input class="btn btn-success" type=button name="add" value="Add image" />
							</form>	
						</div>
  						<div class="col-md-4">
  								Votre date d\'inscription est le '.$donnees['date_inscr'].'.</br>
								Votre résultats au test est de '.$donnees['test'].' sur 6.</br>
						</div>
					</div>

					</br></br>

						<form name="CCompte" method="post" action="fonction_compte.php" enctype="multipart/form-data">
					<div class="">
									<strong>Nom  :  </strong>
										<input type=button name="newnom" value='.$donnees['nom'].'  />
											</br></br>
									<strong>Prenom   :  </strong>
										<input type=button name="newprenom" value='.$donnees['prenom'].'  />
											</br></br>
									<strong>Competences : </strong>
										<input type=button name="newcompetences" value='.$donnees['competences'].'  />
									</br></br>
									<strong>Site  : </strong>
										<input type=button name="newsite" value='.$donnees['site_web'].'  />
									</br></br>
									<strong>Tarif  : </strong>
										<input type=button name="newtarif" value='.$donnees['tarif'].'  />
									</br></br>
									<strong>Langues  : </strong>
										<input type=button name="newlangues" value='.$donnees['langues'].'  />
									</br></br>
									<strong>Localisation  : </strong>
										<input type=button name="newlocalisation" value='.$donnees['localisation'].'  />
									</br></br>
									<div class="">

									
											
									
									<input class="btn btn-success" type=button name="modif" value="Modifier Profil" onClick="compte()" />

									</br></br>

									<button type="submit" class="btn btn-success">Valider</button>
								</form> 
					</div>

				</div>     
				</br></br>

						
							<form name="compt" method="post" action="fonction_compte2.php">

									<strong>Mail  : </strong>
										<input type=button name="newmail" value='.$donnees['mail'].'  />
									</br></br>
															
									<strong>Password  : </strong>
									<input type=button name="newpassword" value="******"  />
									</br></br>
									
									
  											<strong>Warning!</strong> Pour toute modification de pseudo ou du password </br> 
  											vous serait automatiquement déconnecté. 
									

														</br></br>
									<input class="btn btn-success" type=button name="modif2" value="Modifier Connexion" onClick="changeCompte()" />
									</br></br>
									<button type="submit" class="btn btn-success">Valider</button>
							</form>


							<a href="index.php">Revenir Page d\'acceuil.</a>


							
		</div>

 </div>
 </div>

				';

		 } 
		}

?>
<script src="onc.js"></script>

