<?php
include_once('includes/co_bdd.php');
include_once('includes/traitement_co_annonces_free.php');
?>


<!DOCTYPE html>
<html>
<?php 
  include_once('includes/header.php'); 
?>

<script type="text/javascript">
   function deco () {
      window.location= "deconnexion/deco.php";
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
        include_once('navbar\navbar_user_connecte.php');
     }
     else {
     //BARRE MENU UTILISATEUR NON CONNECTE
        include_once('navbar\navbar_user_non_connecte.php');
     }
     //FORMULAIRE DE CONNEXION QUI S'AFFICHE LORS DE LA CONNEXION
     include_once('includes\formulaire_connexion.php');
  ?>

<?php
 
        //REQUETE POUR SELECTIONNER LES INFOS DE LA SOCIETE
      	 $req = $bdd->prepare('SELECT * FROM mbr_free WHERE id_free = :id_free');
        $req->execute(array(
          'id_free' => $_POST['id']
          ));

        $donnees = $req->fetch();
          $nom = $donnees['nom'];
          $prenom = $donnees['prenom'];
          $siret_freelance = $donnees['siret_free'];
          $mail = $donnees['mail'];
          $dat_inscr = $donnees['date_inscr'];
          $test = $donnees['test'];
          $site_web = $donnees['site_web'];
          $photo = $donnees['photo'];
          $localisation = $donnees['localisation'];
          $langues = $donnees['langues'];
          $competences = $donnees['competences'];
?>

<div class="container mise-en-page">
    <div style="background-color: #337ab7;color: white;">
      <span>
        <center><h1>PROFIL FREELANCE<span style="text-transform: uppercase;"></span></h1></center>
      </span>
    </div>
    <div class="col-md-offset-2 col-md-8">
        		<div class="row">
        			<div>
                <img class="img-responsive" style="width: 30%;height: 30%;max-width: 170px;max-height: 150px;float: right; border-radius: 5px; border: 1px solid #337ab7;" id="photo" src="img/default.jpg">
                <h4>Date d'inscription: <?php echo $dat_inscr?></h4>
              </div>
              <div>
                <h3><b>&nbsp;</b></h3>
              </div>              
              <div>
                <h3><b>Nom: </b><?php echo $_POST['nom'];?></h3>
                <h3><b>Préom: </b><?php echo $_POST['prenom'];?></h3>
              </div>
              <div>
                <h3><b>Localisation: </b><?php echo $_POST['localisation'];?></h3>
              </div>              
                   <hr class="hr-blue">
            </div>
            <div class="row">
            <center>
              <div>
                <h2>Disponible: Oui</h2>
              </div>
            </center>            
              <div style="margin-top:20px;border-radius: 5px; border: 1px solid #337ab7;">
                <center><h4><b>Compétences:</b></h4><?php echo $competences;?></center>
              </div>
              <div style="border-radius: 5px; border: 1px solid #337ab7; margin-top: 1px;">
                <center><h4><b>Langues Maîtrisées:</b></h4><?php echo $_POST['langues'];?></center>
              </div>
              <div style="border-radius: 5px; border: 1px solid #337ab7; margin-top: 1px;">
                <center><h4><b>Site Web: <a></b></h4><?php echo $_POST['site_web'];?></a></center>
              </div>              
              <div style="border-radius: 5px; border: 1px solid #337ab7; margin-top: 1px;">
                <center><h4><b>Tarif: </b></h4><?php echo $_POST['tarif'];?> € - par mois</center>
              </div>
            </div>
            <div>
            <br>
              <center><button class="btn-choix" style="margin-left:-15px;color: white;border-radius: 5px;">JE SOUHAITE CONTACTER CE FREELANCE</button></center>
              <br>
              &nbsp;
            </div>
    </div>
    <div class="col-md-offset-2 col-md-7">
    </div>
</div>
</body>

<script type="text/javascript">

  function Photo () {
    var photo = "<?php echo $photo ?>";
        if (photo != "") {
      document.getElementById('photo').src = "<?php echo $photo ?>";
  }
}

	function helloProfil () {
      Photo();
  }

    window.onload = helloProfil;
</script>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</html>
