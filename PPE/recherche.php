<?php 
  include_once('includes/co_bdd.php'); 
  include_once('includes/traitement_co.php');
?>

<!DOCTYPE html>
<html lang="en">
<?php 
  include_once('includes/header.php'); 
?>

<!-- Corps de la page-->
<body class="my_background bg-color-inscription">

      <?php
      //BARRE MENU UTILISATEUR CONNECTE
      if (!empty($_SESSION['mail_sess'])) {
           if ($_SESSION['type'] == 'freelance') {
            // ON INCLUT LE FICHIER CONTENANT TOUTE LES VARIABLES $_SESSION FREELANCE
            include_once('session/session_freelance.php');
            } else {
            // ON INCLUT LE FICHIER CONTENANT TOUTE LES VARIABLES $_SESSION SOCIETE
            include_once('session/session_societe.php');
            }  

         //BARRE MENU UTILISATEUR CONNECTE
            include_once('navbar\navbar_user_connecte.php');
         }
         else {
         //BARRE MENU UTILISATEUR NON CONNECTE
            include_once('navbar\navbar_user_non_connecte.php');
         }
         //FORMULAIRE DE CONNEXION QUI S'AFFICHE LORS DE LA CONNEXION
         include_once('includes\formulaire_connexion.php');
      ?>

<div class="container mise-en-page">
    <div style="background-color: #337ab7;color: white;">
      <span>
        <center><h1>Votre RECHERCHE</h1></center>
      </span>
    </div>

    <div class="hr-bleu">
      <span>
        <h3>&nbsp;Missions :</h3>
      </span>
    </div>

      <?php 

        if (!empty($_POST['recherche'])) {
        $words = preg_split('/\s+/', $_POST['recherche']);

            $ok = 0;
            $x = 0;
            $z = 0;
            $a = 0;
            $c = 0;
            while ($c != 100) {
              if (sizeof($words) > 1 AND $x != 1 ) {
                for($k = 1 + $z ; $k < sizeof($words) ; $k++) {
                  if($words[$a] == $words[$k]) {
                  	/*var_dump($words);*/
                    unset($words[$k]);
                    $words = array_values($words);
                    break;
                  }
                  if ($k == sizeof($words) - 1) {
                  		$a = $a + 1;
                  		$z = $z + 1;
                  		if ($a == sizeof($words) - 2) {
                  			$x = 1;
                  		}
                  	}
                }
              } else {
                $ok = 1;
              }
              $c = $c + 1;
            }
          }

          $reponse = $bdd->query('SELECT titre, id_soci, nom_soci, date_publi, date_debut, duree, salaire, description, lieu, competences FROM annonces ORDER BY date_publi DESC');
          $c = 0;
          $a = 0;
          while ($donnees = $reponse->fetch())
          {
            if (!empty($_POST['recherche'])) {
              for($i = 0 ; $i < sizeof($words) ; $i++) {
               if (stristr($donnees['competences'], $words[$i]))
                {
                   echo '<ul class="annonces-focus" onclick="traitement('.$c.')">
                   <li><b>Titre :</b> ' .$donnees['titre']. '</li>
                   <li><b>Entreprise :</b> ' .$donnees['nom_soci']. '</li>
                   <li><b>Date de publication :</b> ' .$donnees['date_publi']. '</li>
                   <li><b>Date de début :</b> ' .$donnees['date_debut']. '</li>
                   <li><b>Budget :</b> ' .$donnees['salaire']. '€</li>
                   <li><b>Description :</b> ' .$donnees['description']. '</li>
                   <li><b>Lieu :</b> ' .$donnees['lieu']. '</li>
                   <li><b>Compétences requises :</b> ' .$donnees['competences']. '</li>
                   <form name="mission" id="mission'.$c.'" action="mission.php?='.$donnees['titre'].'" method="post">
                   <input name="titre" value="'.$donnees['titre'].'" type="hidden">
                   <input name="duree" value="'.$donnees['duree'].'" type="hidden">
                   <input name="id" value="'.$donnees['id_soci'].'" type="hidden">
                   <input name="entreprise" value="'.$donnees['nom_soci'].'" type="hidden">
                   <input name="date_publication" value="'.$donnees['date_publi'].'" type="hidden">
                   <input name="date_debut" value="'.$donnees['date_debut'].'" type="hidden">
                   <input name="salaire" value="'.$donnees['salaire'].'" type="hidden">
                   <input name="description" value="'.$donnees['description'].'" type="hidden">
                   <input name="lieu" value="'.$donnees['lieu'].'" type="hidden">
                   <input name="competences" value="'.$donnees['competences'].'" type="hidden"> 
                   </form>                   
                 </ul>
                 <hr class="hr-blue">';
                 $a = $a + 1;
              }
            }
        }
         $c = $c + 1;
       }
       if ($a == 0) {
            echo '<b><h1>Aucun Résultat !</h1></b>
             <hr class="hr-blue">';
          }
        ?>
     <div class="hr-bleu">
      <span>
        <h3>&nbsp;Profils :</h3>
      </span>
    </div>
    <?php 

     $reponse = $bdd->query('SELECT id_free, nom, prenom, photo, mail, date_inscr, competences, site_web, tarif, langues, localisation FROM mbr_free ORDER BY date_inscr DESC');
    $c = 0;
    $a = 0;
    while ($donnees = $reponse->fetch())
    {
      if (!empty($_POST['recherche'])) {
        for($i = 0 ; $i < sizeof($words) ; $i++) {
          if (stristr($donnees['competences'], $words[$i]))
              {
           echo '<ul class="annonces-focus" onclick="traitement('.$c.')">';
           if ($donnees['photo'] != "") {
             echo '<img class="img-responsive" style="width: 30%;height: 30%;max-width: 170px;max-height: 150px;float: right; border-radius: 5px; border: 1px solid #337ab7;" id="photo" src="'.$donnees['photo'].'">';
           } else {
             echo '<img class="img-responsive" style="width: 30%;height: 30%;max-width: 170px;max-height: 150px;float: right; border-radius: 5px; border: 1px solid #337ab7;" id="photo" src="img/default.jpg">';
           }
           echo'<li><b>Nom :</b> ' .$donnees['nom']. '</li>
           <li><b>Prénom :</b> ' .$donnees['prenom']. '</li>
           <li><b>Email :</b> ' .$donnees['mail']. '</li>
           <li><b>Date d\'inscription :</b> ' .$donnees['date_inscr']. '</li>
           <li><b>Compétences :</b> ' .$donnees['competences']. '</li>
           <li><b>Site Web :</b> ' .$donnees['site_web']. '</li>
           <li><b>Tarif :</b> ' .$donnees['tarif']. '€</li>
           <li><b>Langues parlées :</b> ' .$donnees['langues']. '</li>
           <li><b>Localisation :</b> ' .$donnees['localisation']. '</li>
           <form name="profil.freelance" id="profil.freelance'.$c.'" action="profil.freelance.php?='.$donnees['competences'].'" method="post">
           <input name="titre" value="'.$donnees['nom'].'" type="hidden">
           <input name="id" value="'.$donnees['id_free'].'" type="hidden">
           <input name="nom" value="'.$donnees['nom'].'" type="hidden">
           <input name="prenom" value="'.$donnees['prenom'].'" type="hidden">
           <input name="mail" value="'.$donnees['mail'].'" type="hidden">
           <input name="date_inscr" value="'.$donnees['date_inscr'].'" type="hidden">
           <input name="competences" value="'.$donnees['competences'].'" type="hidden">
           <input name="site_web" value="'.$donnees['site_web'].'" type="hidden">
           <input name="tarif" value="'.$donnees['tarif'].'" type="hidden">
           <input name="langues" value="'.$donnees['langues'].'" type="hidden"> 
           <input name="localisation" value="'.$donnees['localisation'].'" type="hidden"> 
           </form>                   
         </ul>
         <hr class="hr-blue">';
               $a = $a + 1;
             }
          }
        }
   $c = $c + 1;
 }
 if ($a == 0) {
            echo '<b><h1>Aucun Résultat !</h1></b>
             <hr class="hr-blue">';
          }
 ?>

</div>
</body>

   <script type="text/javascript">
        function deco () 
    {
      window.location= "deconnexion/index.php";
    }

        function traitement (x)
    {
      document.getElementById("mission"+x).submit();
      return false;
    }        
    function traitementFreelance (x)
    {
      document.getElementById("profil.freelance"+x).submit();
      return false;
    }

    </script>

<script>

  $( "#radio_dev" ).on( "click", function() {
    $( "#div_dev" ).css({opacity: 0.0, visibility: "visible"}).animate({opacity: 1}, 800);
    $( "#div_prog" ).css({opacity: 0.0, visibility: "hidden"}).animate({opacity: 1}, 800);
    $( "#div_reseau" ).css({opacity: 0.0, visibility: "hidden"}).animate({opacity: 1}, 800);
  });

  $( "#radio_prog" ).on( "click", function() {
    $( "#div_prog" ).css({opacity: 0.0, visibility: "visible"}).animate({opacity: 1}, 800);
    $( "#div_dev" ).css({opacity: 0.0, visibility: "hidden"}).animate({opacity: 1}, 800);
    $( "#div_reseau" ).css({opacity: 0.0, visibility: "hidden"}).animate({opacity: 1}, 800);
  });

  $( "#radio_reseau" ).on( "click", function() {
    $( "#div_reseau" ).css({opacity: 0.0, visibility: "visible"}).animate({opacity: 1}, 800);
    $( "#div_prog" ).css({opacity: 0.0, visibility: "hidden"}).animate({opacity: 1}, 800);
    $( "#div_dev" ).css({opacity: 0.0, visibility: "hidden"}).animate({opacity: 1}, 800);
  });

</script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>