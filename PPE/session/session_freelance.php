<?php
			//////////////////////////////////////////////////////////////////////
			//                                                                  //
			//		  FICHIER CONTENANT LES VARIABLES $_SESSION FREELANCE		      //
			//                                                                  //
			//////////////////////////////////////////////////////////////////////
              $req = $bdd->prepare('SELECT * FROM mbr_free WHERE mail = :mail');
              $req->execute(array(
                'mail' => $_SESSION['mail_sess']
                ));

              $donnees = $req->fetch();
              $_SESSION['prenom'] = $donnees['prenom'];
              $_SESSION['id'] = $donnees['id_free'];
?>