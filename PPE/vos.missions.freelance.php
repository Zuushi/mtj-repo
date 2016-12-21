<?php 
  include_once('includes/co_bdd.php'); 
  include_once('includes/traitement_co_recherche.php');
?>

<!DOCTYPE html>
<html lang="en">
<?php 
  include_once('includes/header.php'); 

          $req = $bdd->prepare('SELECT * FROM annonces WHERE id_free = :id_free');
          $req->execute(array(
          'id_free' => $_SESSION['id']
          ));
          $a = 0;
          while ($donnees = $req->fetch())
          {
            $a = $a + 1;
        }
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
        <center><h1>Vos MISSIONS EN COURS</h1></center>
      </span>
    </div>
    <?php if (isset($_SESSION['supprimer_mission'])) { ?>
      <center>
        <div class="alert alert-warning">
          <p>Mission supprimé avec succès !</p>
        </div>
      </center>
    <?php unset($_SESSION['supprimer_mission']); } ?>
    <div class="hr-bleu">
      <span>
        <h3>&nbsp;Vos MISSIONS: <?php echo $a ?> MISSION(S)</h3>
      </span>
    </div> 


      <?php 
          $req = $bdd->prepare('SELECT * FROM annonces WHERE id_free = :id_free');
          $req->execute(array(
          'id_free' => $_SESSION['id']
          ));
          $a = 0;
          while ($donnees = $req->fetch())
          {
                   echo '<ul class="annonces-focus" onclick="traitement('.$a.')">
                   <li><b>Titre :</b> ' .$donnees['titre']. '</li>
                   <li><b>Entreprise :</b> ' .$donnees['nom_soci']. '</li>
                   <li><b>Date de publication :</b> ' .$donnees['date_publi']. '</li>
                   <li><b>Date de début :</b> ' .$donnees['date_debut']. '</li>
                   <li><b>Budget :</b> ' .$donnees['salaire']. '€</li>
                   <li><b>Description :</b> ' .$donnees['description']. '</li>
                   <li><b>Lieu :</b> ' .$donnees['lieu']. '</li>
                   <li><b>Compétences requises :</b> ' .$donnees['competences']. '</li>
                   <form name="mission" id="mission'.$a.'" action="mission.php?='.$donnees['titre'].'" method="post">
                   <input name="titre" value="'.$donnees['titre'].'" type="hidden">
                   <input name="duree" value="'.$donnees['duree'].'" type="hidden">
                   <input name="id" value="'.$donnees['id_soci'].'" type="hidden">
                   <input name="id_annonce" value="'.$donnees['id_ann'].'" type="hidden">
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
      window.location= "deconnexion/deco.php";
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