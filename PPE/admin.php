<?php 
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

         <button id="btn_admin" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#ann_soci2" aria-expanded="false" aria-controls="collapseExample">
  GESTION DES ANNONCES SOCIETES
</button>
      <div class="collapse" id="ann_soci2">

       <?php
       $reponse = $bdd->query('SELECT id_ann, titre, nom_soci, date_publi, date_debut, duree, salaire, description, lieu, competences FROM annonces ORDER BY date_publi DESC');
       $c = 0;
       while ($donnees = $reponse->fetch())
       {
         echo '

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

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Modifier</button>
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
   </ul>
   <hr class="hr-blue">';

 }
 ?>

</div>

<br>


<!-- GESTION PROFILS FREELANCES  -->
  <button id="btn_admin" class="btn btn-primary" type="button" data-toggle="collapse" data-target="#ann_free" aria-expanded="false" aria-controls="collapseExample">
  GESTION DES PROFILS FREELANCES
</button>
      <div class="collapse" id="ann_free">

        <?php

$reponse = $bdd->query('SELECT id_free, siret_free, nom, prenom, mail, date_inscr, competences, site_web, tarif, langues, localisation FROM mbr_free ORDER BY date_inscr DESC');
$c = 0;
while ($donnees = $reponse->fetch())
{
  echo '<ul class="annonces-focus">
  
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

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Modifier</button>
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
    window.location= "deco_annonces.php";
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