<?php 
session_start();
$_SESSION['type'] = 'admin';
include_once('includes/co_bdd.php'); 
include_once('includes/traitement_co_annonces.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
 <meta name="description" content="">
 <meta name="author" content="">
 <link rel="icon" href="img/ico.png">

 <title>PPE Site Freelance</title>

 <!-- Bootstrap core CSS -->
 <link href="dist/css/bootstrap.css" rel="stylesheet">

 <!-- Custom CSS -->
 <link href="css/full-slider.css" rel="stylesheet">

 <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

 <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
 <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
 <script src="assets/js/ie-emulation-modes-warning.js"></script>

 <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

 <style type="text/css">
   .form-horizontal {
    position: relative;right: 5%;
   }
 </style>




</head>

<!-- Corps de la page-->
<body class="my_background bg-color-inscription">
<?php if (!empty($_SESSION['success_supp_annonce']) and $_SESSION['success_supp_annonce'] == 1) { ?>
	<div id="msg-suppression-annonce" class="alert alert-success" style="position: fixed;top: 50px; left: 45%; z-index: 1">
		<p id="msg-suppression-annonce">Annonce supprimé avec succès !</p>
	</div>
<?php
	unset($_SESSION['success_supp_annonce']);
 } 
  if (!empty($_SESSION['success_supp_freelance']) and $_SESSION['success_supp_freelance'] == 1) { ?>
	<div id="msg-suppression-freelance" class="alert alert-success" style="position: fixed;top: 50px; left: 45%; z-index: 1">
		<p id="msg-suppression-freelance">Freelance supprimé avec succès !</p>
	</div>
<?php
	unset($_SESSION['success_supp_freelance']);
 } ?>
<?php
      //BARRE MENU UTILISATEUR CONNECTE
      if (!empty($_SESSION['mail_sess'])) {
         //BARRE MENU UTILISATEUR CONNECTE
            include_once('navbar/navbar_user_connecte.php');  
        } else {
         //BARRE MENU UTILISATEUR NON CONNECTE
            include_once('navbar/navbar_user_non_connecte.php');
         }
         //FORMULAIRE DE CONNEXION QUI S'AFFICHE LORS DE LA CONNEXION
         include_once('includes/formulaire_connexion.php');

      ?>
  <!-- Full Page Image Background Carousel Header -->
  <?php

  if (!empty($_GET['result']))
  {
    echo '<p id="p_err_co">Mauvais identifiant ou mot de passe</p>';
  }

  ?>

  <?php

  if (empty($_SESSION['admin'])) {

    header('Location: index.php'); 
    
  }

  ?>


  <div class="container mise-en-page">
    <div style="background-color: #337ab7;color: white;">
      <span>
        <center><h1>Espace Admin</h1></center>
      </span>
    </div>
    <p id="text_admin">Bienvenu dans l'espace d'administration. Sélectionnez la catégorie sur laquelle vous souhaitez apporter
      des modifications.</p>


      <!-- GESTION ANNONCES SOCIETES -->

<button id="btn_admin" style="min-width: 100%;margin-bottom: 1%" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#ann_soci2" aria-expanded="false" aria-controls="collapseExample">
  GESTION DES ANNONCES SOCIETES
</button>
      <div class="collapse" id="ann_soci2">

       <?php
       $reponse = $bdd->query('SELECT id_ann, titre, nom_soci, date_publi, date_debut, duree, salaire, description, lieu, competences FROM annonces ORDER BY date_publi DESC');
       $c = 0;
       while ($donnees = $reponse->fetch())
       {
         echo '<ul class="annonces-focus">
         <br>

         <form class="form-horizontal" id="form_admin" method="post" action="includes/traitement_admin.php">

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label" id="label_admin">Titre :</label>
            <div class="col-sm-8">
              <input name="titre" type="text" class="form-control" id="input_admin" placeholder="' .$donnees['titre']. '">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label" id="label_admin">Entreprise :</label>
            <div class="col-sm-8">
              <input name="nom_soci" type="text" class="form-control" id="input_admin" placeholder="' .$donnees['nom_soci']. '">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label" id="label_admin">Date de publication :</label>
            <div class="col-sm-8">
              <input name="date_publi" type="text" class="form-control" id="input_admin" placeholder="' .$donnees['date_publi']. '">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label" id="label_admin">Date de début :</label>
            <div class="col-sm-8">
              <input name="date_debut" type="text" class="form-control" id="input_admin" placeholder="' .$donnees['date_debut']. '">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label" id="label_admin">Budget :</label>
            <div class="col-sm-8">
              <input name="salaire" type="text" class="form-control" id="input_admin" placeholder="' .$donnees['salaire']. '€">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label" id="label_admin">Description :</label>
            <div class="col-sm-8">
              <input name="description" type="text" class="form-control" id="input_admin" placeholder="'.$donnees['description'].'">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label" id="label_admin">Lieu :</label>
            <div class="col-sm-8">
              <input name="lieu" type="text" class="form-control" id="input_admin" placeholder="' .$donnees['lieu']. '">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label" id="label_admin">Compétences requises :</label>
            <div class="col-sm-8">
              <input name="competences" type="text" class="form-control" id="input_admin" placeholder="' .$donnees['competences']. '">
            </div>
          </div>

          <input type="hidden" name="id_ann" value="' .$donnees['id_ann']. '">
          <input type="hidden" name="supprimer_annonce" id="supprimer_annonce">

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-warning">Modifier</button>
              <button class="btn btn-danger" onclick="return supprimerAnnonce()">Supprimer</button>
            </div>            
          </div>

        </form>


      </form>
      <form name="mission" id="mission'.$c.'" action="mission.php?='.$donnees['titre'].'" method="post">
       <input name="titre" value="'.$donnees['titre'].'" type="hidden">
       <input name="entreprise" value="'.$donnees['nom_soci'].'" type="hidden">
       <input name="date_publication" value="'.$donnees['date_publi'].'" type="hidden">
       <input name="date_debut" value="'.$donnees['date_debut'].'" type="hidden">
       <input name="salaire" value="'.$donnees['salaire'].'" type="hidden">
       <input name="description" value="'.$donnees['description'].'" type="hidden">
       <input name="lieu" value="'.$donnees['lieu'].'" type="hidden">
       <input name="competences" value="'.$donnees['competences'].'" type="hidden"> 
     </form> 
     <br>                  
   </ul>
   <hr class="hr-blue">';

 }
 ?>

</div>

<br>


<!-- GESTION PROFILS FREELANCES  -->
  <button id="btn_admin" style="min-width: 100%;margin-top: 1%;margin-bottom: 1%" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#ann_free" aria-expanded="false" aria-controls="collapseExample">
  GESTION DES PROFILS FREELANCES
</button>
      <div class="collapse" id="ann_free">

        <?php

$reponse = $bdd->query('SELECT id_free, siret_free, nom, prenom, mail, date_inscr, competences, site_web, tarif, langues, localisation FROM mbr_free ORDER BY date_inscr DESC');
$c = 0;
while ($donnees = $reponse->fetch())
{
  echo '<ul class="annonces-focus">
  <br>
  
         <form class="form-horizontal" id="form_admin" method="post" action="includes/traitement_admin.php">

         <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label" id="label_admin">N° Siret :</label>
            <div class="col-sm-8">
              <input name="siret_free" type="text" class="form-control" id="input_admin" placeholder="' .$donnees['siret_free']. '">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label" id="label_admin">Nom :</label>
            <div class="col-sm-8">
              <input name="nom" type="text" class="form-control" id="input_admin" placeholder="' .$donnees['nom']. '">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label" id="label_admin">prénom :</label>
            <div class="col-sm-8">
              <input name="prenom" type="text" class="form-control" id="input_admin" placeholder="' .$donnees['prenom']. '">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label" id="label_admin">Mail :</label>
            <div class="col-sm-8">
              <input name="mail" type="text" class="form-control" id="input_admin" placeholder="' .$donnees['mail']. '">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label" id="label_admin">Date d\'inscription :</label>
            <div class="col-sm-8">
              <input name="date_inscr" type="text" class="form-control" id="input_admin" placeholder="' .$donnees['date_inscr']. '">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label" id="label_admin">Compétences :</label>
            <div class="col-sm-8">
              <input name="competences" type="text" class="form-control" id="input_admin" placeholder="' .$donnees['competences']. '€">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label" id="label_admin">Site web :</label>
            <div class="col-sm-8">
              <input name="site_web" type="text" class="form-control" id="input_admin" placeholder="'.$donnees['site_web'].'">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label" id="label_admin">Tarif :</label>
            <div class="col-sm-8">
              <input name="tarif" type="text" class="form-control" id="input_admin" placeholder="' .$donnees['tarif']. '">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label" id="label_admin">Langues :</label>
            <div class="col-sm-8">
              <input name="langues" type="text" class="form-control" id="input_admin" placeholder="' .$donnees['langues']. '">
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-4 control-label" id="label_admin">Localisation :</label>
            <div class="col-sm-8">
              <input name="localisation" type="text" class="form-control" id="input_admin" placeholder="' .$donnees['localisation']. '">
            </div>
          </div>

          <input type="hidden" name="id_free" value="' .$donnees['id_free']. '">
          <input type="hidden" name="supprimer_freelance" id="supprimer_freelance">

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-warning">Modifier</button>
              <button class="btn btn-danger" onclick="return supprimerFreelance()">Supprimer</button>
            </div>
          </div>

        </form>


  <form name="mission" id="mission'.$c.'" action="mission.php?='.$donnees['competences'].'" method="post">
   <input name="titre" value="'.$donnees['nom'].'" type="hidden">
   <input name="entreprise" value="'.$donnees['prenom'].'" type="hidden">
   <input name="date_publication" value="'.$donnees['mail'].'" type="hidden">
   <input name="date_debut" value="'.$donnees['date_inscr'].'" type="hidden">
   <input name="salaire" value="'.$donnees['competences'].'" type="hidden">
   <input name="description" value="'.$donnees['site_web'].'" type="hidden">
   <input name="lieu" value="'.$donnees['tarif'].'" type="hidden">
   <input name="competences" value="'.$donnees['langues'].'" type="hidden"> 
   <input name="localisation" value="'.$donnees['localisation'].'" type="hidden"> 
 </form>  
 <br>                 
</ul>
<hr class="hr-blue">';
     /*if (stristr($donnees['titre'],'java'))
     {
     ;
   }*/
   $c = $c + 1;
 }
 ?>

</div>

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
    window.location = "./deconnexion/deco.php";
  }

  function traitement (x)
  {
    document.getElementById("mission"+x).submit();
    return false;
  }

  function supprimerFreelance () {
  	if (confirm("Supprimer le freelance ?")) {
  		document.getElementById('supprimer_freelance').value = 1;
  	} else {
  		document.getElementById('supprimer_freelance').value = 0;
  		return false;
  	}
  }

  function supprimerAnnonce () {
  	if (confirm("Supprimer la mission ?")) {
  		document.getElementById('supprimer_annonce').value = 1;
  	} else {
  		document.getElementById('supprimer_annonce').value = 0;
  		return false;
  	}
  }
    function FluffyKittenMaker(SomeNumberThing)
    {
    	var div = document.getElementById('msg-suppression-annonce');
    	div.style.opacity = SomeNumberThing/100;
    }   

    function disappear (SomeNumberThing)
    {
    	if (document.getElementById('msg-suppression-annonce') && document.getElementById('msg-suppression-annonce').style.opacity <= 100) 
    	{
		    FluffyKittenMaker(SomeNumberThing);
		    SomeNumberThing -= 0.2;
		    window.setTimeout("disappear("+SomeNumberThing+")", 1);
		}
		if (document.getElementById('msg-suppression-annonce') && document.getElementById('msg-suppression-annonce').style.opacity <= 0)
		{
			
			document.getElementById('msg-suppression-annonce').style.display = "none";
		}
    }    

    function FluffyKittenFreelance(SomeNumberThing)
    {
    	var div = document.getElementById('msg-suppression-freelance');
    	div.style.opacity = SomeNumberThing/100;
    }   

    function disappearFreelance (SomeNumberThing)
    {
    	if (document.getElementById('msg-suppression-freelance') && document.getElementById('msg-suppression-freelance').style.opacity <= 100) 
    	{
		    FluffyKittenFreelance(SomeNumberThing);
		    SomeNumberThing -= 0.2;
		    window.setTimeout("disappearFreelance("+SomeNumberThing+")", 1);
		}
		if (document.getElementById('msg-suppression-freelance') && document.getElementById('msg-suppression-freelance').style.opacity <= 0)
		{
			
			document.getElementById('msg-suppression-freelance').style.display = "none";
		}
    }

    function loading () {
	    setTimeout(function(){
	    	disappear(100);
	    	disappearFreelance(100);
		}, 2000);
    }

    window.onload = loading;

</script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>