<?php
include_once('includes/co_bdd.php');
include_once('includes/traitement_co_annonces.php');

  if ($_SESSION['id'] != $_POST['id']) {
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
      	 $req = $bdd->prepare('SELECT * FROM mbr_society WHERE id_soc = :id_soc');
        $req->execute(array(
          'id_soc' => $_POST['id']
          ));

        $donnees = $req->fetch();
          $raison_sociale = $donnees['raison_sociale'];
          $siret_societe = $donnees['siret'];
          $mail = $donnees['mail'];
          $dat_inscr = $donnees['date_inscr'];
          $capital = $donnees['capital'];
          $site_web = $donnees['site_web'];
          $logo = $donnees['logo'];
          $siege_social = $donnees['siege_social'];
          $recruteur = $donnees['recruteur'];
          $caracteristiques = $donnees['caracteristiques'];
?>
<form method="post" name="modifier_mission" id="modifier_mission">
<div class="container mise-en-page">
    <div style="background-color: #337ab7;color: white;">
      <span>
        <center>
          <h1>Titre de MISSION: <span style="text-transform: uppercase;"><?php echo $_POST['titre'];?>
          <input type="hidden" name="titre" value="<?php echo $_POST['titre'];?>"></span></h1>
          <input type="hidden" name="id" value="<?php echo $_POST['id'];?>"></span></h1>
        </center>
      </span>
    </div>
    <?php
    //INSERTION BDD
    if (!empty($_POST['id_societe'])) {
        //REQUETE POUR SELECTIONNER LES INFOS DE LA SOCIETE
         $req = $bdd->prepare('SELECT * FROM mbr_society WHERE id_soc = :id_soc');
        $req->execute(array(
          'id_soc' => $_POST['id_societe']
          ));

        $donnees = $req->fetch();
          $raison_sociale = $donnees['raison_sociale'];
          $siret_societe = $donnees['siret'];
          $mail = $donnees['mail'];
          $dat_inscr = $donnees['date_inscr'];
          $capital = $donnees['capital'];
          $site_web = $donnees['site_web'];
          $logo = $donnees['logo'];
          $siege_social = $donnees['siege_social'];
          $recruteur = $donnees['recruteur'];
          $caracteristiques = $donnees['caracteristiques'];

      $doublon = 0;
        $req = $bdd->prepare('SELECT * FROM messagerie WHERE id_free = :id_free');
        $req->execute(array(
          'id_free' => $_SESSION['id']
          ));
      while ($doublon == 0 AND $donnees = $req->fetch()) {
        if ($donnees['id_soci'] == $_POST['id_soci']) {
          $doublon = 1;
        }
      }

      if ($doublon == 0) {
        //REQUETE POUR METTRE EN CONTACT LA SOCIETE ET LE FREELANCE
        $req = $bdd->prepare('INSERT INTO messagerie(id_free, id_soci, message_free) VALUES (:id_free, :id_soci, :message_soci)');
        $req->execute(array(
          'id_free' => $_SESSION['id'],
          'id_soci' => $_POST['id_soci'],
          'message_soci' => 'Félicitation ! M.'.strtoupper($_SESSION['nom']).' souhaite entrer en contact avec vous pour un éventuel contrat ! Celui-ci a postuler à votre offre '.$_POST['titre']
          )); ?>
      <center>
      <div class="alert alert-success">
          <p>Le message a bien été envoyé ! Retrouvez-vos discussions onglet Profil > Mes relations !</p><br>
      </div>
      </center>

<?php } else { ?>
      <center>
      <div class="alert alert-danger">
          <p>Vous etes déjà en contact avec cette entreprise ! Retrouvez-vos discussions onglet Profil > Mes relations !</p><br>
      </div>
      </center>
<?php } }?>


<?php include_once('includes\modifier_mission.php');?>
    <div class="col-md-offset-2 col-md-8">
        		<div class="row">
        			<div>
                <img class="img-responsive" style="width: 30%;height: 30%;max-width: 170px;max-height: 150px;float: right; border-radius: 5px; border: 1px solid #337ab7;" id="photo2" src="img/default_societe.gif">
                <h4>Date de publication: <?php echo $_POST['date_publication']?></h4><input type="hidden" name="date_publication" value="<?php echo $_POST['date_publication']?>">
              </div>
              <div>
                <h3><b>&nbsp;</b></h3>
              </div>              
              <div>
                <h3><b>Entreprise: </b><?php echo $_POST['entreprise'];?></h3><input type="hidden" name="entreprise" value="<?php echo $_POST['entreprise'];?>">
              </div>
              <div>
                <h3><b>Lieu de mission: </b><span id="1"><?php echo $_POST['lieu'];?></span></h3>
                <input type='text' class="form-control" style="max-width: 200px; visibility: hidden" id="11" name="lieu_modification" value="<?php echo $_POST['lieu'];?>"/>
              </div>              
                   <hr class="hr-blue">
            </div>
            <div class="row">
            <center>
              <div>
                <h2>Date de début de la mission:
                <div id="2"><?php echo $_POST['date_debut']?></div></h2>
                <input type='text' class="form-control" style="max-width: 200px; display: none;" id="12" name="date_debut_modification" value="<?php echo $_POST['date_debut']?>" />
              </div>
            </center>            
              <div style="margin-top:20px;border-radius: 5px; border: 1px solid #337ab7;">
                <center>
                  <h4><b>Compétences requises:</b></h4>
                  <div id="3"><?php echo $_POST['competences'];?></div>
                  <input type='text' class="form-control" style="max-width: 200px; display: none;" id="7" name="competences_modification" value="<?php echo $_POST['competences'];?>" />
                </center>
              </div>
              <div style="border-radius: 5px; border: 1px solid #337ab7; margin-top: 1px;">
                <center>
                  <h4><b>Description de la mission:</b></h4>
                  <div id="4"><?php echo $_POST['description'];?></div>
                  <textarea type='text' class="form-control" style="max-width: 200px;display: none; min-height:200px;" id="8" name="description_modification"><?php echo $_POST['description'];?></textarea>
                </center>
              </div>
              <div style="border-radius: 5px; border: 1px solid #337ab7; margin-top: 1px;">
                <center>
                  <h4><b>Durée de la mission: </b></h4>
                  <div id="5"><?php echo $_POST['duree'];?> - renouvelable</div>
                  <input type='text' class="form-control" style="max-width: 200px; display: none;" id="9" name="duree_modification" value="<?php echo $_POST['duree'];?>" />
                </center>
              </div>              
              <div style="border-radius: 5px; border: 1px solid #337ab7; margin-top: 1px;">
                <center>
                  <h4><b>Salaire: </b></h4>
                  <div id="6"><?php echo $_POST['salaire'];?> € - négociable</div>
                        <input type='text' class="form-control" style="max-width: 200px;display: none;" id="10" name="salaire_modification" value="<?php echo $_POST['salaire'];?>" />
                </center>
              </div>
            </div>

            <?php if (!isset($_SESSION['id']) || $_SESSION['id'] != $_POST['id']) { ?>
            <form method="post" name="contacter_societe" id="contacter_societe">
            <input type="hidden" name="id_soci" value="<?php echo $_POST ['id'];?>">
            <input type="hidden" name="id_societe" value="<?php echo $_POST ['id'];?>">
            <input type="hidden" name="date_publication" value="<?php echo $_POST['date_publication']?>">
            <input type="hidden" name="date_debut" value="<?php echo $_POST['date_debut']?>">
            <input type="hidden" name="entreprise" value="<?php echo $_POST ['entreprise'];?>">
            <input type="hidden" name="lieu" value="<?php echo $_POST ['lieu'];?>">
            <input type="hidden" name="salaire" value="<?php echo $_POST ['salaire'];?>">
            <input type="hidden" name="description" value="<?php echo $_POST ['description'];?>">
            <input type="hidden" name="competences" value="<?php echo $_POST ['competences'];?>">
            <input type="hidden" name="duree" value="<?php echo $_POST ['duree'];?>">
            <div>
            <br>
              <center><button type="submit" class="btn-choix" style="margin-left:-15px;color: white;border-radius: 5px;">JE SOUHAITE POSTULER A CETTE MISSION</button></center>
              <br>
              &nbsp;
            </div>
            </form>
            <?php } else { ?>
            <div>
            <br>
              <center>
              <input type="button" name="modifier" class="btn-choix" id="modifier" value="MODIFIER" onclick="Modifier()" style="margin-left:-15px;color: white;border-radius: 5px;">&nbsp;
              <input type="button" name="supprimer" class="btn-choix" id="supprimer" value="SUPPRIMER" onclick="Valider()" style="color: white;border-radius: 5px;">
              </center>
              <br>
              &nbsp;
            </div>
            <?php } ?>
          <input type="hidden" name="checker" id="checker" value="0">
          <input type="hidden" name="id_annonce" value="<?php echo $_POST['id_annonce']?>">
    </div>
  </form>
  <form name="supprimer_mission" id="supprimer_mission" action="includes/supprimer_mission.php" method="post">
    <input type="hidden" name="checker2" id="checker2" value="2">
    <input type="hidden" name="id_annonce" value="<?php echo $_POST['id_annonce']?>">
  </form>
    <div class="col-md-offset-2 col-md-7">
    </div>
</div>
</body>

<script type="text/javascript">

  function Photo2 () {
    var logo = "<?php echo $logo ?>";
    if (logo != "") {
      document.getElementById('photo2').src = "<?php echo $logo ?>";
    }
  }

	function helloProfil () {
    Photo2();
  }

  function Valider () {
    var btn_supprimer = document.getElementById('supprimer');
    if (btn_supprimer.value == "VALIDER" && confirm("Modifier la Mission ?")) {
      var modifier_mission = window.document.modifier_mission;
          modifier_mission.submit();
    } else if (btn_supprimer.value == "SUPPRIMER" && confirm("ATTENTION ! Supprimer la Mission ?")) {
          var supprimer_mission = window.document.supprimer_mission;
          supprimer_mission.submit();
    }
  }

  function Modifier () {
    var btn_modifier = document.getElementById('modifier');
    var btn_supprimer = document.getElementById('supprimer');
    var annuler;

    if (btn_modifier.value == "MODIFIER") {
      annuler = 0;
    } else {
      annuler = 1;
    }

    if (annuler == 0) {
      btn_modifier.style.backgroundColor = "red";
      btn_modifier.value = "ANNULER";    
      btn_supprimer.style.backgroundColor = "green";
      btn_supprimer.value = "VALIDER";
    } else {
      btn_modifier.style.backgroundColor = "rgb(111, 146, 179)";
      btn_modifier.value = "MODIFIER";    
      btn_supprimer.style.backgroundColor = "rgb(111, 146, 179)";
      btn_supprimer.value = "SUPPRIMER";
    }
  }

    window.onload = helloProfil;

$('#modifier').click(function(){
  if (document.getElementById('modifier').value == "ANNULER") {
    $('#1').hide();
    $('#2').hide();
    $('#3').hide();
    $('#4').hide();
    $('#5').hide();
    $('#6').hide();  
    $('#7').show();
    $('#8').show();
    $('#9').show();
    $('#10').show();
    $('#11').show();
    $('#12').show();
  } else {
    $('#1').show();
    $('#2').show();
    $('#3').show();
    $('#4').show();
    $('#5').show();
    $('#6').show();  
    $('#7').hide();
    $('#8').hide();
    $('#9').hide();
    $('#10').hide();
    $('#11').hide();
    $('#12').hide();
  }

});
</script>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</html>
