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
      if (!empty($_SESSION['mail_sess'])) 

      {

        $req = $bdd->prepare('SELECT * FROM mbr_free WHERE mail = :mail');
        $req->execute(array(
          'mail' => $_SESSION['mail_sess']
          ));

        $donnees = $req->fetch();
        $_SESSION['prenom'] = $donnees['prenom'];
        $_SESSION['id_free'] = $donnees['id_free'];
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
          <form class="navbar-form navbar-right">
            <div class="form-group" id="form-index">
              <input type="search" class="input-xl form-control bar-form" id="bar-index" placeholder="Mot-clés..."><button type="submit" class="btn btn-primary" id="btn-search"><span class="glyphicon glyphicon-search"></span> Chercher</button> 
            </div>
            <div class="form-group">
              <div class="lien-nav2"><a href="view_annonces_free.php"><B>ENGAGER UN FREELANCE</B></a></div>
              <div class="lien-nav2"><a href="view_annonces.php"><B>CONTRAT &nbsp;DE&nbsp; MISSION</B></a></div>
              <div class="lien-nav2"><a href="#guide"><B>GUIDE POUR DEMARRER</B></a></div>
            </div>

            <div class="btn-nav-index">
                <button type="button" class="btn btn-primary" id="btn-deconnexion" onclick="deco()">Déconnexion</button>
                    <div class="dropdown">
                      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Profil
                      <span class="caret"></span></button>
                      <ul class="dropdown-menu">
                      <li><center class="blue"><?php echo 'Bonjour '.$donnees['prenom'].' !'; ?></center></li>
                        <li><hr></li>
                        <li><a href="profil.php"><span class="blue">Mes informations</span></a></li>
                        <li><a href="#"><span class="blue">Mes relations</span></a></li>
                        <li><a href="#"><span class="blue">Mes contrats</span></a></li>
                        <li><a href="qcm.php"><span class="blue">QCM</span></a></li>
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
          <form class="navbar-form navbar-right">
            <div class="form-group" id="form-index">
              <input type="search" class="input-xl form-control bar-form" id="bar-index" placeholder="Mot-clés..."><button type="submit" class="btn btn-primary" id="btn-search"><span class="glyphicon glyphicon-search"></span> Chercher</button> 
            </div>
            <div class="form-group">
              <div class="lien-nav2"><a href="view_annonces_free.php"><B>ENGAGER UN FREELANCE</B></a></div>
              <div class="lien-nav2"><a href="view_annonces.php"><B>CONTRAT &nbsp;DE&nbsp; MISSION</B></a></div>
              <div class="lien-nav2"><a href="#guide"><B>GUIDE POUR DEMARRER</B></a></div>
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
          <input id="radio_dev" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="dev"> Développement Web
        </label>

        <div id="div_dev" style="visibility: hidden;">
          <select name="spe1" style="width: 200px;" class="form-control">
            <option value="langages">Toutes les offres</option>
            <option value="php">PHP/MySQL</option>
            <option value="css">HTML5/CSS3</option>
            <option value="js">JavaScript/JQuery/Ajax</option>     
            <option value="autre">Autres langages</option>  
          </select>
        </div>

      </div>
      <div class="col-md-4">

        <label class="radio-inline">
          <input id="radio_prog" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="prog"> Programmation Logicielle
        </label>

        <div id="div_prog" style="visibility: hidden;">
          <select name="spe2" style="width: 200px;" class="form-control">
           <option value="langages">Toutes les offres</option>
            <option value="c">C/C++</option>
            <option value="python">python</option>
            <option value="java">Java</option>       
            <option value="autre">Autres langages</option>       
          </select>
        </div>

      </div>
      <div class="col-md-4">

        <label class="radio-inline">
          <input id="radio_reseau" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="reseau"> Systèmes Réseaux
        </label>

        <div id="div_reseau" style="visibility: hidden;">
          <select name="spe3" style="width: 200px;" class="form-control">
           <option value="specialites">Toutes les offres</option>
            <option value="windows">Windows 2008 Servers</option>
            <option value="cisco">Cisco Systems</option>
            <option value="securite">Sécurité Réseau</option>       
            <option value="securite">Autre spécialisation</option>       
          </select>
        </div>

      </div>

      <div class="form-group">
        <br />
      </div>

      <center><a class="btn btn-default" href="view_annonces.php">Toutes les annonces</a>&nbsp;&nbsp;<button type="submit" class="btn btn-primary">Rechercher</button></center>


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

    $reponse = $bdd->query('SELECT titre, nom_soci, date_publi, date_debut, duree, salaire, description, lieu, competences FROM annonces ORDER BY date_publi DESC');
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
   /*if (stristr($donnees['titre'],'java'))
   {
    echo'salop';
   }*/
   $c = $c + 1;
 }
}

 //AFFICHE TOUTE LES ANNONCES SI AUCUN FILTRE SPÉCIFIÉ
  if (!empty($_POST)) {

 if ($_POST['spe1'] == 'langages' AND $_POST['spe2'] == 'langages' AND $_POST['spe3'] == 'specialites')
 {
    $reponse = $bdd->query('SELECT titre, nom_soci, date_publi, date_debut, duree, salaire, description, lieu, competences FROM annonces ORDER BY date_publi DESC');

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
   $c = $c + 1;
 }
}
}

if (!empty($_POST) AND !empty($_POST['inlineRadioOptions'])) {

//AFFICHAGE EN FONCTION DE LA CATEGORIE
  if ($_POST['spe1'] == 'langages' AND $_POST['spe2'] == 'langages' AND $_POST['spe3'] == 'specialites' OR empty($_POST['spe1']) AND empty($_POST['spe2']) AND empty($_POST['spe3'])) {

    $req = $bdd->prepare('SELECT titre, nom_soci, date_publi, date_debut, duree, salaire, description, lieu, competences FROM annonces WHERE cat = :cat ORDER BY date_publi DESC');
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
   $c = $c + 1;
 }

}

//AFFICHAGE EN FONCTION DE LA SPECIALITE
if ($_POST['spe1'] != 'langages' AND $_POST['spe2'] != 'langages' AND $_POST['spe3'] != 'specialites' AND !empty($_POST['spe1']) OR !empty($_POST['spe2']) OR !empty($_POST['spe3'])) 
{
$req = $bdd->prepare('SELECT titre, nom_soci, date_publi, date_debut, duree, salaire, description, lieu, competences FROM annonces WHERE spe = :spe OR spe = :spe2 OR spe = :spe3 ORDER BY date_publi DESC');
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
   $c = $c + 1;
 }
}

}

?>

</div>
</body>

<script type="text/javascript">
    function traitement (x)
    {
      document.getElementById("mission"+x).submit();
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

<script type="text/javascript">
    function deco () 
    {
      window.location= "deco_annonces.php";
    }

</script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>