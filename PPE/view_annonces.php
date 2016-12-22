<?php 
  include_once('includes/co_bdd.php'); 
  include_once('includes/traitement_co_annonces.php');
  if ($_SESSION['type'] == 'societe') {
    header("location: index.php");
  }
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
      if (isset($_SESSION['type']) AND $_SESSION['type'] == 'societe') { ?>
        <meta http-equiv="refresh" content="0; URL=index.php">
     <?php } ?>

<div class="container mise-en-page">
    <div style="background-color: #337ab7;color: white;">
      <span>
        <center><h1>Chercher une MISSION</h1></center>
      </span>
    </div>

    <div class="hr-bleu">
      <span>
        <h3>&nbsp;Filtrer les annonces :</h3>
      </span>
    </div>

  <form class="form-horizontal" method="post" action="">
  <center>
      <div>
      <br />
    </div>
    <div class="row">
      <div class="col-md-4">

        <label class="radio-inline">
          <input id="radio_dev" type="radio" name="inlineRadioOptions" onclick="check()" value="dev"> Développement Web
        </label>

        <div id="div_dev" style="visibility: hidden;">
          <select name="spe1" style="width: 200px;" class="form-control">
            <option value="langages">Toutes les offres</option>
            <option value="php">PHP/MySQL</option>
            <option value="css">HTML5/CSS3</option>
            <option value="js">JavaScript/JQuery/Ajax</option>     
            <option value="a1">Autres langages</option>  
          </select>
        </div>

      </div>
      <div class="col-md-4">

        <label class="radio-inline">
          <input id="radio_prog" type="radio" name="inlineRadioOptions" onclick="check()" value="prog"> Programmation Logicielle
        </label>

        <div id="div_prog" style="visibility: hidden;">
          <select name="spe2" style="width: 200px;" class="form-control">
           <option value="langages">Toutes les offres</option>
            <option value="c">C/C++</option>
            <option value="python">Python</option>
            <option value="java">Java</option>       
            <option value="a2">Autres langages</option>       
          </select>
        </div>

      </div>
      <div class="col-md-4">

        <label class="radio-inline">
          <input id="radio_reseau" type="radio" name="inlineRadioOptions" onclick="check()" value="reseau"> Systèmes Réseaux
        </label>

        <div id="div_reseau" style="visibility: hidden;">
          <select name="spe3" style="width: 200px;" class="form-control">
           <option value="specialites">Toutes les offres</option>
            <option value="windows">Windows 2008 Servers</option>
            <option value="cisco">Cisco Systems</option>
            <option value="securite">Sécurité Réseau</option>       
            <option value="a3">Autre spécialisation</option>       
          </select>
        </div>

      </div>

      <div class="form-group">
        <br />
      </div>

      <center><a class="btn btn-default" href="view_annonces.php">Toutes les annonces</a>&nbsp;&nbsp;<button id="btn-rech" type="submit" title="Veuillez choisir votre filtre avant de cliquer" class="btn btn-primary">Rechercher</button></center>


    </div>
  </center>
  </form>



    <div class="hr-bleu">
      <span>
        <h3>&nbsp;Annonces :</h3>
      </span>
    </div>

  <?php

//AFFICHAGE PAR DEFAUT DE TOUTES LES ANNONCES
  if (empty($_POST)) {

    $reponse = $bdd->query('SELECT id_ann, id_soci, titre, nom_soci, date_publi, date_debut, duree, salaire, description, lieu, competences FROM annonces ORDER BY date_publi DESC');
    $c = 0;
    while ($donnees = $reponse->fetch())
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
     <input name="id" value="'.$donnees['id_soci'].'" type="hidden">
     <input name="id_annonce" value="'.$donnees['id_ann'].'" type="hidden">
     <input name="titre" value="'.$donnees['titre'].'" type="hidden">
     <input name="duree" value="'.$donnees['duree'].'" type="hidden">
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
   /*if (stristr($donnees['titre'],'java'))
   {
    echo'salop';
   }*/
   $c = $c + 1;
 }
}

if (!empty($_POST) AND !empty($_POST['inlineRadioOptions'])) {

//AFFICHAGE EN FONCTION DE LA CATEGORIE
  if ($_POST['spe1'] == 'langages' AND $_POST['spe2'] == 'langages' AND $_POST['spe3'] == 'specialites' OR empty($_POST['spe1']) AND empty($_POST['spe2']) AND empty($_POST['spe3'])) {

    $req = $bdd->prepare('SELECT id_ann, id_soci, titre, nom_soci, date_publi, date_debut, duree, salaire, description, lieu, competences FROM annonces WHERE cat = :cat ORDER BY date_publi DESC');
    $req->execute(array(
      'cat' => $_POST['inlineRadioOptions']
      ));

    $c = 0;
    while ($donnees = $req->fetch())
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
     <input name="id" value="'.$donnees['id_soci'].'" type="hidden">
     <input name="id_annonce" value="'.$donnees['id_ann'].'" type="hidden">
     <input name="titre" value="'.$donnees['titre'].'" type="hidden">
     <input name="duree" value="'.$donnees['duree'].'" type="hidden">
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
   $c = $c + 1;
 }

}

//AFFICHAGE EN FONCTION DE LA SPECIALITE
if ($_POST['spe1'] != 'langages' AND $_POST['spe2'] != 'langages' AND $_POST['spe3'] != 'specialites' AND !empty($_POST['spe1']) OR !empty($_POST['spe2']) OR !empty($_POST['spe3'])) 
{
$req = $bdd->prepare('SELECT id_ann, id_soci, titre, nom_soci, date_publi, date_debut, duree, salaire, description, lieu, competences FROM annonces WHERE spe = :spe OR spe = :spe2 OR spe = :spe3 ORDER BY date_publi DESC');
$req->execute(array(
  'spe' => $_POST['spe1'],
  'spe2' => $_POST['spe2'],
  'spe3' => $_POST['spe3']
  ));

    $c = 0;
    while ($donnees = $req->fetch())
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
     <input name="id" value="'.$donnees['id_soci'].'" type="hidden">
     <input name="id_annonce" value="'.$donnees['id_ann'].'" type="hidden">
     <input name="titre" value="'.$donnees['titre'].'" type="hidden">
     <input name="duree" value="'.$donnees['duree'].'" type="hidden">
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
   $c = $c + 1;
 }
}

}

?>

</div>
</body>

<script type="text/javascript">

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


<script type="text/javascript">
      function check () {
        var b1 = document.getElementById('radio_dev');
        var b2 = document.getElementById('radio_prog');
        var b3 = document.getElementById('radio_reseau');
        var c = 0;

        if (b1.checked) {
          c = 1;
          document.getElementById('btn-rech').disabled = false;
      } else if (b2.checked) {
        c = 2;
        document.getElementById('btn-rech').disabled = false;
      } else if (b3.checked) {
        c = 3;
        document.getElementById('btn-rech').disabled = false;
      }

      if (c == 0) {
        document.getElementById('btn-rech').disabled = true;
      }
      }

      window.onload = check;

        function deco () 
    {
      window.location= "deconnexion/deco_annonces.php";
    }

        function traitement (x)
    {
      document.getElementById("mission"+x).submit();
      return false;
    }
  </script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>