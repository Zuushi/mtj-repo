<?php
include_once('includes/co_bdd.php');
include_once('includes/traitement_co_annonces.php');

if (!isset($_SESSION['id'])) {
  header("location: index.php");
}
?>


<!DOCTYPE html>
<html>
<?php 
  include_once('includes/header.php'); 
?>

<script type="text/javascript">
   function deco () {
      window.location= "./deconnexion/deco.php";
    }
</script>

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
        include_once('navbar/navbar_user_connecte.php');
     }
     else {
     //BARRE MENU UTILISATEUR NON CONNECTE
        include_once('navbar/navbar_user_non_connecte.php');
     }
     //FORMULAIRE DE CONNEXION QUI S'AFFICHE LORS DE LA CONNEXION
     include_once('includes/formulaire_connexion.php');
?>


<!-- SI L USER CONNECTE EST UNE SOCIETE -->
<?php if ($_SESSION['type'] == 'societe') {
        //REQUETE POUR SELECTIONNER LES CONTACTS DE LA SOCIETE
        $req = $bdd->prepare('SELECT * FROM messagerie WHERE id_soci = :id_soci');
        $req->execute(array(
          'id_soci' => $_SESSION['id']
          ));
        $contacts = array();
        $i = 0;
        $unique = 0;
        $f = 0;
        $c = 0;
        $a = 0;
        $z = 0;
        while ($donnees = $req->fetch()) {
            $contacts[$i] = $donnees['id_free'];
          $i = $i + 1 ;
        }

      while ($c < 1000) {
        if (sizeof($contacts) > 1) {
          for($k = 1 + $z ; $k < sizeof($contacts) ; $k++) {
            if($contacts[$a] == $contacts[$k]) {
              unset($contacts[$k]);
              $contacts = array_values($contacts);
              break;
            }
            if ($k == sizeof($contacts) - 1) {
                $a = $a + 1;
                $z = $z + 1;
              }
          }
        }
        $c = $c + 1;
      }
?>

<div class="container mise-en-page">
    <div style="background-color: #337ab7;color: white;">
      <span>
        <center>
          <h1>Mes DISCUSSIONS: <span style="text-transform: uppercase;">
        </center>
      </span>
    </div>
      <div class="hr-bleu">
      <span>
        <h3>&nbsp;Les FREELANCES:</h3>
      </span>
    </div>
<?php
    while ($f < sizeof($contacts)) {
      $reponse = $bdd->query('SELECT id_free, nom, prenom, mail, localisation, photo FROM mbr_free WHERE id_free ='.$contacts[$f]);
      if ($donnees = $reponse->fetch()) {
     echo '<ul class="annonces-focus" onclick="traitement('.$f.')">';
     if ($donnees['photo'] != "") {
       echo '<img class="img-responsive" style="width: 30%;height: 30%;max-width: 170px;max-height: 150px;float: right; border-radius: 5px; border: 1px solid #337ab7;" id="photo" src="'.$donnees['photo'].'">';
     } else {
       echo '<img class="img-responsive" style="width: 30%;height: 30%;max-width: 170px;max-height: 150px;float: right; border-radius: 5px; border: 1px solid #337ab7;" id="photo" src="img/default.jpg">';
     }
     echo'<li><b>Nom :</b> ' .$donnees['nom']. '</li><br>
     <li><b>Prénom :</b> ' .$donnees['prenom']. '</li><br>
     <li><b>Email :</b> ' .$donnees['mail']. '</li><br>
     <li><b>Localisation :</b> ' .$donnees['localisation']. '</li><br>
     <form name="salle" id="salle'.$f.'" action="salle.php?='.$donnees['nom'].'" method="post">
     <input name="id_free" value="'.$donnees['id_free'].'" type="hidden">
     <input name="nom" value="'.$donnees['nom'].'" type="hidden">
     <input name="prenom" value="'.$donnees['prenom'].'" type="hidden">
     <input name="mail" value="'.$donnees['mail'].'" type="hidden">
     <input name="localisation" value="'.$donnees['localisation'].'" type="hidden"> 
     </form>                   
   </ul>
   <hr class="hr-blue">';
   $f = $f + 1;
 }
  if ($f == 0) {
       echo '<ul>
       <h3>Aucun contact actuellement...</h3>            
   </ul>
   <hr class="hr-blue">';
 }
}

 // SI L USER CONNECTE EST UN FREELANCE
 // SI L USER CONNECTE EST UN FREELANCE
 // SI L USER CONNECTE EST UN FREELANCE
 // SI L USER CONNECTE EST UN FREELANCE
 // SI L USER CONNECTE EST UN FREELANCE
} else {

        //REQUETE POUR SELECTIONNER LES CONTACTS DU FREELANCE
        $req = $bdd->prepare('SELECT * FROM messagerie WHERE id_free = :id_free');
        $req->execute(array(
          'id_free' => $_SESSION['id']
          ));
        $contacts = array();
        $i = 0;
        $unique = 0;
        $f = 0;
        $c = 0;
        $a = 0;
        $z = 0;
        while ($donnees = $req->fetch()) {
            $contacts[$i] = $donnees['id_soci'];
          $i = $i + 1 ;
        }

      while ($c < 1000) {
        if (sizeof($contacts) > 1) {
          for($k = 1 + $z ; $k < sizeof($contacts) ; $k++) {
            if($contacts[$a] == $contacts[$k]) {
              unset($contacts[$k]);
              $contacts = array_values($contacts);
              break;
            }
            if ($k == sizeof($contacts) - 1) {
                $a = $a + 1;
                $z = $z + 1;
              }
          }
        }
        $c = $c + 1;
      }
?>

<div class="container mise-en-page">
    <div style="background-color: #337ab7;color: white;">
      <span>
        <center>
          <h1>Mes DISCUSSIONS: <span style="text-transform: uppercase;">
        </center>
      </span>
    </div>
      <div class="hr-bleu">
      <span>
        <h3>&nbsp;Les SOCIETES:</h3>
      </span>
    </div>
    <?php
    while ($f < sizeof($contacts)) {
      $reponse = $bdd->query('SELECT id_soc, recruteur, raison_sociale, mail, logo FROM mbr_society WHERE id_soc ='.$contacts[$f]);
      while ($donnees = $reponse->fetch()) {
     echo '<ul class="annonces-focus" onclick="traitement('.$f.')">';
     if ($donnees['logo'] != "") {
       echo '<img class="img-responsive" style="width: 30%;height: 30%;max-width: 170px;max-height: 150px;float: right; border-radius: 5px; border: 1px solid #337ab7;" id="photo" src="'.$donnees['logo'].'">';
     } else {
       echo '<img class="img-responsive" style="width: 30%;height: 30%;max-width: 170px;max-height: 150px;float: right; border-radius: 5px; border: 1px solid #337ab7;" id="photo" src="img/default_societe.jpg">';
     }
     echo'<li><b>Entreprise :</b> ' .$donnees['raison_sociale']. '</li><br>
     <li><b>Recruteur :</b> ' .$donnees['recruteur']. '</li><br>
     <li><b>Email :</b> ' .$donnees['mail']. '</li><br><br>
     <form name="salle" id="salle'.$f.'" action="salle.php" method="post">
     <input name="id_soci" value="'.$donnees['id_soc'].'" type="hidden">
     <input name="raison_sociale" value="'.$donnees['raison_sociale'].'" type="hidden">
     <input name="recruteur" value="'.$donnees['recruteur'].'" type="hidden">
     <input name="mail" value="'.$donnees['mail'].'" type="hidden">
     </form>                   
   </ul>
   <hr class="hr-blue">';
   }
   $f = $f + 1;
 }
  if ($f == 0) {
       echo '<ul>
       <h3>Aucun contact actuellement...</h3>            
   </ul>
   <hr class="hr-blue">';
 }
}?>
</div>
    <div class="col-md-offset-2 col-md-8">	
  </div>
</body>

<script type="text/javascript">

  function traitement (x)
    {
      document.getElementById('salle'+x).submit();
      return false;
    }

</script>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</html>
