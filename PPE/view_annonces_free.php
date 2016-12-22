<?php 
  include_once('includes/co_bdd.php'); 
  include_once('includes/traitement_co_annonces_free.php');
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
     if (isset($_SESSION['type']) AND $_SESSION['type'] == 'freelance') { ?>
        <meta http-equiv="refresh" content="0; URL=index.php">
     <?php } ?> 

<div class="container mise-en-page">
    <div style="background-color: #337ab7;color: white;">
      <span>
        <center><h1>Chercher un FREELANCE</h1></center>
      </span>
    </div>

    <div class="hr-bleu">
      <span>
        <h3>&nbsp;Filtrer les profils :</h3>
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
          <input id="radio_dev" type="radio" name="inlineRadioOptions" onclick="check()" value="web"> Développeur Web
        </label>

        <div id="div_dev" style="visibility: hidden;">
          <select name="spe1" style="width: 200px;" class="form-control">
            <option value="langages">Toutes les profils</option>
            <option value="php">Développeur PHP/MySQL</option>
            <option value="html">Intégrateur HTML5/CSS3</option>
            <option value="js">Développeur FULLSTACK</option>       
            <option value="a1">Autres Profils</option>       
          </select>
        </div>

      </div>
      <div class="col-md-4">

        <label class="radio-inline">
          <input id="radio_prog" type="radio" name="inlineRadioOptions" onclick="check()" value="programmeur"> Programmeur
        </label>

        <div id="div_prog" style="visibility: hidden;">
          <select name="spe2" style="width: 200px;" class="form-control">
           <option value="langages">Toutes les offres</option>
            <option value="c">Programmeur C/C++</option>
            <option value="java">Programmeur Android/Java</option>
            <option value="python">Programmeur Python</option>         
            <option value="a2">Autres profils</option>         
          </select>
        </div>

      </div>
      <div class="col-md-4">

        <label class="radio-inline">
          <input id="radio_reseau" type="radio" name="inlineRadioOptions" onclick="check()" value="reseau"> Ingénieur Réseaux
        </label>

        <div id="div_reseau" style="visibility: hidden;">
          <select name="spe3" style="width: 200px;" class="form-control">
           <option value="specialites">Toutes les offres</option>
            <option value="windows">Senior Windows Server</option>
            <option value="cisco">Certifié Cisco Systems</option>
            <option value="securite">Ingénieur Sécurité Réseau</option>       
            <option value="a3">Autres Profils</option>       
          </select>
        </div>

      </div>

      <div class="form-group">
        <br />
      </div>

      <center><a class="btn btn-default" href="view_annonces_free.php">Tout les profils</a>&nbsp;&nbsp;<button type="submit" id="btn-rech" title="Veuillez choisir votre filtre avant de cliquer" class="btn btn-primary">Rechercher</button></center>


    </div>
  </center>
  </form>

    <div class="hr-bleu">
      <span>
        <h3>&nbsp;Les profils :</h3>
      </span>
    </div>

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
      window.location= "deconnexion/deco_annonces_free.php";
    }

        function traitement (x)
    {
      document.getElementById("profil.freelance"+x).submit();
      return false;
    }

    </script>
  <?php

//AFFICHAGE PAR DEFAUT DE TOUTES LES ANNONCES
  if (empty($_POST)) {

    $reponse = $bdd->query('SELECT id_free, nom, prenom, photo, mail, date_inscr, competences, site_web, tarif, langues, localisation FROM mbr_free ORDER BY date_inscr DESC');
    $c = 0;
    while ($donnees = $reponse->fetch())
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
   /*if (stristr($donnees['titre'],'java'))
   {
    ;
   }*/
   $c = $c + 1;
 }
}

 

if (!empty($_POST)) {

//AFFICHAGE EN FONCTION DE LA CATEGORIE
  if ($_POST['spe1'] == 'langages' AND $_POST['spe2'] == 'langages' AND $_POST['spe3'] == 'specialites' OR empty($_POST['spe1']) AND empty($_POST['spe2']) AND empty($_POST['spe3'])) {

    $req = $bdd->prepare('SELECT id_free, nom, prenom, mail, photo, date_inscr, competences, site_web, tarif, langues, localisation FROM mbr_free WHERE cat = :cat ORDER BY date_inscr DESC');
    $req->execute(array(
      'cat' => $_POST['inlineRadioOptions']
      ));

    $c = 0;
    while ($donnees = $req->fetch())
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
   $c = $c + 1;
 }

}

//AFFICHAGE EN FONCTION DE LA SPECIALITE
if ($_POST['spe1'] != 'langages' AND $_POST['spe2'] != 'langages' AND $_POST['spe3'] != 'specialites' AND !empty($_POST['spe1']) OR !empty($_POST['spe2']) OR !empty($_POST['spe3'])) 
{
$req = $bdd->prepare('SELECT id_free, nom, prenom, photo, mail, date_inscr, competences, site_web, tarif, langues, localisation FROM mbr_free WHERE spe = :spe OR spe = :spe2 OR spe = :spe3 ORDER BY date_inscr DESC');
$req->execute(array(
  'spe' => $_POST['spe1'],
  'spe2' => $_POST['spe2'],
  'spe3' => $_POST['spe3']
  ));

    $c = 0;
    while ($donnees = $req->fetch())
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
   $c = $c + 1;
 }
}

}

?>

</div>
</body>

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