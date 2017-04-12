<?php
			//////////////////////////////////////////////////////////////////////
			//                                                                  //
			//		  FICHIER CONTENANT LES VARIABLES $_SESSION SOCIETE   	      //
			//                                                                  //
			//////////////////////////////////////////////////////////////////////
              $req = $bdd->prepare('SELECT * FROM mbr_society WHERE mail = :mail');
              $req->execute(array(
                'mail' => $_SESSION['mail_sess']
                ));

              $donnees = $req->fetch();
              $_SESSION['prenom'] = $donnees['recruteur'];
              $_SESSION['raison_sociale'] = $donnees['raison_sociale'];
              $_SESSION['id'] = $donnees['id_soc'];
              $_SESSION['accueil'] = ""+$donnees['recruteur'];
              $_SESSION['type'] = 'societe';
?>