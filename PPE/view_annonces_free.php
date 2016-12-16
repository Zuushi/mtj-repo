<?php 
  include_once('includes/co_bdd.php'); 
  include_once('includes/traitement_co_annonces_free.php');
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




</head>

<!-- Corps de la page-->
<body class="my_background bg-color-inscription">

   <?php

      //BARRE MENU UTILISATEUR CONNECTE
      if (!empty($_SESSION['mail_sess'])) {
           if ($_SESSION['type'] == 'freelance') {
              $req = $bdd->prepare('SELECT * FROM mbr_free WHERE mail = :mail');
              $req->execute(array(
                'mail' => $_SESSION['mail_sess']
                ));

              $donnees = $req->fetch();
              $_SESSION['prenom'] = $donnees['prenom'];
              $_SESSION['id'] = $donnees['id_free'];
            } else {
              $req = $bdd->prepare('SELECT * FROM mbr_society WHERE mail = :mail');
              $req->execute(array(
                'mail' => $_SESSION['mail_sess']
                ));

              $donnees = $req->fetch();
              $_SESSION['prenom'] = $donnees['recruteur'];
              $_SESSION['id'] = $donnees['id_soc'];
            }  
        ?>



          <nav class="navbar navbar-inverse">
      <div class="container2">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span  style="font-weight: bold">Menu</span>
          </button>
          <div id="div-logo">
          <a href="index.php"><img class="image-resp" src="img/FS5.png" id="logo"></a>   
            <a class="lien-nav" href="index.php"><B>FREELANCE-SPHERE.COM</B></a>
          </div>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        <center>
          <form class="navbar-form navbar-right" action="recherche.php" method="post">
            <div class="form-group" id="form-index">
              <input type="search" class="input-xl form-control bar-form" name="recherche" id="bar-index" placeholder="Mots-clés..."><button type="submit" class="btn btn-primary" id="btn-search"><span class="glyphicon glyphicon-search"></span> Chercher</button> 
            </div>
            <div class="form-group">
              <div class="lien-nav2"><a href="view_annonces_free.php"><B>ENGAGER UN FREELANCE</B></a></div>
              <div class="lien-nav2"><a href="view_annonces.php"><B>CONTRAT &nbsp;DE&nbsp; MISSION</B></a></div>
              <div class="lien-nav2"><a href="index.php#guide"><B>GUIDE POUR DEMARRER</B></a></div>
            </div>

            <div class="btn-nav-index">
                <button type="button" class="btn btn-primary" id="btn-deconnexion" onclick="deco()">Déconnexion</button>
                    <div class="dropdown">
                      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Profil
                      <span class="caret"></span></button>
                      <ul class="dropdown-menu">
                      <li><center class="blue">&nbsp;<?php echo 'Bonjour '.$_SESSION['prenom'].'!'; ?>&nbsp;</center></li>
                        <li><hr></li>
                        <li><a href="profil.php"><span class="blue">Mon Profil</span></a></li>
                        <li><a href="#"><span class="blue">Mes Relations</span></a></li>
                        <li><a href="#"><span class="blue">Mes Contrats</span></a></li>
                      </ul>
                    </div>
            </div>
          </form>
          </center>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

      <?php

         }
         //BARRE MENU UTILISATEUR NON CONNECTE
         else
         {
          ?>




          <nav class="navbar navbar-inverse">
      <div class="container2">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span  style="font-weight: bold">Menu</span>
          </button>
          <div id="div-logo">
          <a href="index.php"><img class="image-resp" src="img/FS5.png" id="logo"></a>   
            <a class="lien-nav" href="index.php"><B>FREELANCE-SPHERE.COM</B></a>
          </div>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        <center>
          <form class="navbar-form navbar-right" action="recherche.php" method="post">
            <div class="form-group" id="form-index">
              <input type="search" class="input-xl form-control bar-form" id="bar-index" name="recherche" placeholder="Mots-clés..."><button type="submit" class="btn btn-primary" id="btn-search"><span class="glyphicon glyphicon-search"></span> Chercher</button> 
            </div>
            <div class="form-group">
              <div class="lien-nav2"><a href="view_annonces_free.php"><B>ENGAGER UN FREELANCE</B></a></div>
              <div class="lien-nav2"><a href="view_annonces.php"><B>CONTRAT &nbsp;DE&nbsp; MISSION</B></a></div>
              <div class="lien-nav2"><a href="index.php#guide"><B>GUIDE POUR DEMARRER</B></a></div>
            </div>
                      <div class="btn-nav-index">
                <button type="button" class="btn btn-primary" id="btn-connexion" data-toggle="modal" data-target="#connexion">Connexion</button>
                  <a href="inscription.php"><button type="button" class="btn btn-primary">Créer un compte</button></a>
              </div>
          </form>
          </center>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

      <?php
         }

      ?>
      <!-- Connexion -->
      <div class="modal fade" id="connexion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header title-color">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Veuillez saisir vos identifiants</h4>
                </center>
            </div>
            <!-- Champ connexion-->

            <form method="post" action="">

              <div class="modal-body">
                <div class="row">
                  <div class="col-md-offset-2 col-md-7">
                    <div class="form-group blue">
                      <label for="Email">Adresse Mail</label>
                      <input type="text" class="form-control" name="email" placeholder="Entrez l'email">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-offset-2 col-md-7">
                    <div class="form-group blue">
                      <label for="Password">Mot de passe</label>
                      <input type="password" class="form-control" name="password" placeholder="Mot de passe">
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer footer-color">
                <button type="button" class="btn btn-default" data-dismiss="modal">Retour</button>
                <button type="submit" class="btn btn-default">Connexion</button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- Full Page Image Background Carousel Header -->
      <?php

      if (!empty($_GET['result']))
      {
        echo '<p id="p_err_co">Mauvais identifiant ou mot de passe</p>';
      }

      ?>

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
      window.location= "deco_annonces_free.php";
    }

        function traitement (x)
    {
      document.getElementById("mission"+x).submit();
      return false;
    }

    </script>

  <?php

//AFFICHAGE PAR DEFAUT DE TOUTES LES ANNONCES
  if (empty($_POST)) {

    $reponse = $bdd->query('SELECT nom, prenom, mail, date_inscr, competences, site_web, tarif, langues, localisation FROM mbr_free ORDER BY date_inscr DESC');
    $c = 0;
    while ($donnees = $reponse->fetch())
    {
     echo '<ul class="annonces-focus" onclick="traitement('.$c.')">
     <li><b>Nom :</b> ' .$donnees['nom']. '</li>
     <li><b>Prénom :</b> ' .$donnees['prenom']. '</li>
     <li><b>Email :</b> ' .$donnees['mail']. '</li>
     <li><b>Date d\'inscription :</b> ' .$donnees['date_inscr']. '</li>
     <li><b>Compétences :</b> ' .$donnees['competences']. '</li>
     <li><b>Site Web :</b> ' .$donnees['site_web']. '</li>
     <li><b>Tarif :</b> ' .$donnees['tarif']. '€</li>
     <li><b>Langues parlées :</b> ' .$donnees['langues']. '</li>
     <li><b>Localisation :</b> ' .$donnees['localisation']. '</li>
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

    $req = $bdd->prepare('SELECT nom, prenom, mail, date_inscr, competences, site_web, tarif, langues, localisation FROM mbr_free WHERE cat = :cat ORDER BY date_inscr DESC');
    $req->execute(array(
      'cat' => $_POST['inlineRadioOptions']
      ));

    $c = 0;
    while ($donnees = $req->fetch())
    {
      echo '<ul class="annonces-focus" onclick="traitement('.$c.')">
     <li><b>Nom :</b> ' .$donnees['nom']. '</li>
     <li><b>Prénom :</b> ' .$donnees['prenom']. '</li>
     <li><b>Email :</b> ' .$donnees['mail']. '</li>
     <li><b>Date d\'inscription :</b> ' .$donnees['date_inscr']. '</li>
     <li><b>Compétences :</b> ' .$donnees['competences']. '</li>
     <li><b>Site Web :</b> ' .$donnees['site_web']. '</li>
     <li><b>Tarif :</b> ' .$donnees['tarif']. '€</li>
     <li><b>Langues parlées :</b> ' .$donnees['langues']. '</li>
     <li><b>Localisation :</b> ' .$donnees['localisation']. '</li>
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
   </ul>
   <hr class="hr-blue">';
   $c = $c + 1;
 }

}

//AFFICHAGE EN FONCTION DE LA SPECIALITE
if ($_POST['spe1'] != 'langages' AND $_POST['spe2'] != 'langages' AND $_POST['spe3'] != 'specialites' AND !empty($_POST['spe1']) OR !empty($_POST['spe2']) OR !empty($_POST['spe3'])) 
{
$req = $bdd->prepare('SELECT nom, prenom, mail, date_inscr, competences, site_web, tarif, langues, localisation FROM mbr_free WHERE spe = :spe OR spe = :spe2 OR spe = :spe3 ORDER BY date_inscr DESC');
$req->execute(array(
  'spe' => $_POST['spe1'],
  'spe2' => $_POST['spe2'],
  'spe3' => $_POST['spe3']
  ));

    $c = 0;
    while ($donnees = $req->fetch())
    {
      echo '<ul class="annonces-focus" onclick="traitement('.$c.')">
     <li><b>Nom :</b> ' .$donnees['nom']. '</li>
     <li><b>Prénom :</b> ' .$donnees['prenom']. '</li>
     <li><b>Email :</b> ' .$donnees['mail']. '</li>
     <li><b>Date d\'inscription :</b> ' .$donnees['date_inscr']. '</li>
     <li><b>Compétences :</b> ' .$donnees['competences']. '</li>
     <li><b>Site Web :</b> ' .$donnees['site_web']. '</li>
     <li><b>Tarif :</b> ' .$donnees['tarif']. '€</li>
     <li><b>Langues parlées :</b> ' .$donnees['langues']. '</li>
     <li><b>Localisation :</b> ' .$donnees['localisation']. '</li>
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