<?php
include_once('includes/co_bdd.php');
session_start();
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
      window.location = "deconnexion/deco.php";
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

<form method="post" name="modifier_mission" id="modifier_mission">
<div class="container mise-en-page">
    <div style="background-color: #337ab7;color: white;">
      <span>
        <center>
          <h1>Ma DICUSSION: <span style="text-transform: uppercase;">
        </center>
      </span>
    </div>

<?php if ($_SESSION['type'] == 'societe') { ?>
    <div class="hr-bleu">
      <span>
        <h3>&nbsp;Vous discutez avec: &nbsp;<?php echo strtoupper($_POST['nom']." "); echo strtoupper($_POST['prenom'])?></h3>
      </span>
    </div>

<?php } else { ?>

    <div class="hr-bleu">
      <span>
        <h3>&nbsp;Vous discutez avec la société: &nbsp;<?php echo strtoupper($_POST['raison_sociale']);?></h3>
      </span>
    </div>

<?php }
      if (isset($_POST['message']) AND !empty($_POST['message'])) {
        if ($_SESSION ['type'] == 'freelance') {

        $req = $bdd->prepare('SELECT message_free FROM messagerie WHERE id_free = :id_free');
        $req->execute(array(
          'id_free' => $_SESSION['id']
          ));
        $doublon = 0;
        while ($donnees = $req->fetch() AND $doublon != 1) {
          $message_en_cours = $_POST['message'];
          if ($message_en_cours == $donnees['message_free']) {
            $doublon = 1;
          }
        }
        if ($doublon != 1 AND !empty($message_en_cours)) {

        $heure = (idate('H')+1).':'.idate('i');
        //REQUETE POUR ENVOYER UN MSG DU FREELANCE A LA SOCIETE
        $req = $bdd->prepare('INSERT INTO messagerie(id_free, id_soci, message_free, date_message, heure_message) VALUES (:id_free, :id_soci, :message_free, CURDATE(), :heure_message)');
        $req->execute(array(
          'id_soci' => $_POST['id_soci'],
          'id_free' => $_SESSION['id'],
          'message_free' => $_POST['message'],
          'heure_message' => $heure
          ));
          ?>

        <center>
        <br>
          <div class="alert alert-success">
              <p>Le message a bien été envoyé !</p><br>
          </div>
        </center>

        <?php } }     
        if ($_SESSION ['type'] == 'societe') {

        $req = $bdd->prepare('SELECT message_soci FROM messagerie WHERE id_soci = :id_soci');
        $req->execute(array(
          'id_soci' => $_SESSION['id']
          ));
        $doublon = 0;
        while ($donnees = $req->fetch() AND $doublon != 1) {
          $message_en_cours = $_POST['message'];
          if ($message_en_cours == $donnees['message_soci']) {
            $doublon = 1;
          }
        }
        if ($doublon != 1 AND !empty($message_en_cours)) {
        $heure = (idate('H')+1).':'.idate('i');
        //REQUETE POUR ENVOYER UN MSG DE LA SOCIETE AU FREELANCE
        $req = $bdd->prepare('INSERT INTO messagerie(id_free, id_soci, message_soci, date_message, heure_message) VALUES (:id_free, :id_soci, :message_soci, CURDATE(), :heure_message)');
        $req->execute(array(
          'id_free' => $_POST['id_free'],
          'id_soci' => $_SESSION['id'],
          'heure_message' => $heure,
          'message_soci' => $_POST['message']
          )); ?>
          <center>
          <br>
            <div class="alert alert-success">
                <p>Le message a bien été envoyé !</p><br>
            </div>
          </center>

        <?php } }
      }

  if ($_SESSION['type'] == 'societe') {
  //REQUETE POUR SELECTIONNER LES CONTACTS DE LA SOCIETE
  $req = $bdd->prepare('SELECT * FROM messagerie WHERE id_soci = :id_soci ORDER BY id_mess');
  $req->execute(array(
    'id_soci' => $_SESSION['id']
    ));
  $derniers_msg = 0;
  $derniers_msg_check = 0;
  while ($donnee = $req->fetch()) {
    if ($_POST['id_free'] == $donnee['id_free']) {  
      $derniers_msg++;
    }
  }

  // S IL Y A MOINS DE 6 MSGS ENVOYES
  if ($derniers_msg < 6) {
      $req = $bdd->prepare('SELECT * FROM messagerie WHERE id_soci = :id_soci ORDER BY id_mess');
  $req->execute(array(
    'id_soci' => $_SESSION['id']
    ));

  while ($donnee = $req->fetch()) {
    if ($_POST['id_free'] == $donnee['id_free']) {
      if (!empty($donnee['message_free'])) {


           echo'<h5 style="overflow: hidden"><div style="display:block;"><div style="max-width:400px; border-width: 5px;">
                  <div class="hr-bleu" style="border-radius: 5px 5px 0 0;">
                  <center>'.strtoupper($_POST['nom']." ").strtoupper($_POST['prenom']).' - '.$donnee['date_message'].' '.$donnee['heure_message'].'</center>
                  </div>
                </div>
                  <div style="max-width:400px;border-style: solid;border-width: 1px;border-color: #337ab7;border-radius: 0 0 5px 5px;"><br>
                    <table>
                      <tr>
                        <td style="width:10%"></td>
                        <td style="text-align: justify; text-justify: inter-word;">'.$donnee['message_free'].'</td>
                        <td style="width:10%"></td>
                      </tr>
                    </table>
                    <br>
                  </div>
                  </div></h5>';


    } elseif (!empty($donnee['message_soci'])) {



           echo'<h5 style="overflow: hidden;"><div style="float:right;"><div style="max-width:400px; border-width: 5px;">
                  <div class="hr-bleu" style="background-color: #088A85;border-radius: 5px 5px 0 0;">
                  <center>'.$_SESSION['raison_sociale'].' - '.$donnee['date_message'].' '.$donnee['heure_message'].'</center>
                  </div>
                </div>
                  <div style="max-width:400px;border-style: solid;border-width: 1px;border-color: #088A85;border-radius: 0 0 5px 5px;"><br>
                    <table>
                      <tr>
                        <td style="width:10%"></td>
                        <td style="text-align: justify; text-justify: inter-word;">'.$donnee['message_soci'].'</td>
                        <td style="width:10%"></td>
                      </tr>
                    </table>
                    <br>
                  </div>
                  </div></h5>';
    }
} }

  } else {
      $req = $bdd->prepare('SELECT * FROM messagerie WHERE id_soci = :id_soci ORDER BY id_mess');
      $req->execute(array(
        'id_soci' => $_SESSION['id']
        ));
      $i = 0;
  while ($donnee = $req->fetch()) {
    if ($_POST['id_free'] == $donnee['id_free']) {
      $derniers_msg_check++;
      if (!empty($donnee['message_free']) AND $derniers_msg_check >= $derniers_msg - 5) {

           echo'<h5 style="overflow: hidden"><div style="display:block;"><div style="max-width:400px; border-width: 5px;">
                  <div class="hr-bleu" style="border-radius: 5px 5px 0 0;">
                  <center>'.strtoupper($_POST['nom']." ").strtoupper($_POST['prenom']).' - '.$donnee['date_message'].' '.$donnee['heure_message'].'</center>
                  </div>
                </div>
                  <div style="max-width:400px;border-style: solid;border-width: 1px;border-color: #337ab7;border-radius: 0 0 5px 5px;"><br>
                    <table>
                      <tr>
                        <td style="width:10%"></td>
                        <td style="text-align: justify; text-justify: inter-word;">'.$donnee['message_free'].'</td>
                        <td style="width:10%"></td>
                      </tr>
                    </table>
                    <br>
                  </div>
                  </div></h5>';




    } elseif (!empty($donnee['message_soci']) AND $derniers_msg_check >= $derniers_msg - 5) {

           echo'<h5 style="overflow: hidden;"><div style="float:right;"><div style="max-width:400px; border-width: 5px;">
                  <div class="hr-bleu" style="background-color: #088A85;border-radius: 5px 5px 0 0;">
                  <center>'.$_SESSION['raison_sociale'].' - '.$donnee['date_message'].' '.$donnee['heure_message'].'</center>
                  </div>
                </div>
                  <div style="max-width:400px;border-style: solid;border-width: 1px;border-color: #088A85;border-radius: 0 0 5px 5px;"><br>
                    <table>
                      <tr>
                        <td style="width:10%"></td>
                        <td style="text-align: justify; text-justify: inter-word;">'.$donnee['message_soci'].'</td>
                        <td style="width:10%"></td>
                      </tr>
                    </table>
                    <br>
                  </div>
                  </div></h5>';
    }
} }

  }

 } else {

  if ($_SESSION['type'] == 'freelance') {

$req = $bdd->prepare('SELECT * FROM messagerie WHERE id_free = :id_free ORDER BY id_mess');
  $req->execute(array(
    'id_free' => $_SESSION['id']
    ));
  $derniers_msg = 0;
  $derniers_msg_check = 0;
  while ($donnee = $req->fetch()) {
    if ($_POST['id_soci'] == $donnee['id_soci']) {  
      $derniers_msg++;
    }
  }


  // S IL Y A MOINS DE 6 MSGS ENVOYES
  if ($derniers_msg < 6) {
      $req = $bdd->prepare('SELECT * FROM messagerie WHERE id_free = :id_free ORDER BY id_mess');
  $req->execute(array(
    'id_free' => $_SESSION['id']
    ));

  while ($donnee = $req->fetch()) {
    if ($_POST['id_soci'] == $donnee['id_soci']) {
      if (!empty($donnee['message_free'])) {


           echo'<h5 style="overflow: hidden"><div style="display:block;"><div style="max-width:400px; border-width: 5px;">
                  <div class="hr-bleu" style="border-radius: 5px 5px 0 0;">
                  <center>'.strtoupper($_SESSION['nom']." ").strtoupper($_SESSION['prenom']).' - '.$donnee['date_message'].' '.$donnee['heure_message'].'</center>
                  </div>
                </div>
                  <div style="max-width:400px;border-style: solid;border-width: 1px;border-color: #337ab7;border-radius: 0 0 5px 5px;"><br>
                    <table>
                      <tr>
                        <td style="width:10%"></td>
                        <td style="text-align: justify; text-justify: inter-word;">'.$donnee['message_free'].'</td>
                        <td style="width:10%"></td>
                      </tr>
                    </table>
                    <br>
                  </div>
                  </div></h5>';


    } elseif (!empty($donnee['message_soci'])) {



           echo'<h5 style="overflow: hidden;"><div style="float:right;"><div style="max-width:400px; border-width: 5px;">
                  <div class="hr-bleu" style="background-color: #088A85;border-radius: 5px 5px 0 0;">
                  <center>'.$_POST['raison_sociale'].' - '.$donnee['date_message'].' '.$donnee['heure_message'].'</center>
                  </div>
                </div>
                  <div style="max-width:400px;border-style: solid;border-width: 1px;border-color: #088A85;border-radius: 0 0 5px 5px;"><br>
                    <table>
                      <tr>
                        <td style="width:10%"></td>
                        <td style="text-align: justify; text-justify: inter-word;">'.$donnee['message_soci'].'</td>
                        <td style="width:10%"></td>
                      </tr>
                    </table>
                    <br>
                  </div>
                  </div></h5>';
    }
} }

  } else {
      $req = $bdd->prepare('SELECT * FROM messagerie WHERE id_free = :id_free ORDER BY id_mess');
      $req->execute(array(
        'id_free' => $_SESSION['id']
        ));
      $i = 0;
  while ($donnee = $req->fetch()) {
    if ($_POST['id_soci'] == $donnee['id_soci']) {
      $derniers_msg_check++;
      if (!empty($donnee['message_free']) AND $derniers_msg_check >= $derniers_msg - 5) {

           echo'<h5 style="overflow: hidden"><div style="display:block;"><div style="max-width:400px; border-width: 5px;">
                  <div class="hr-bleu" style="border-radius: 5px 5px 0 0;">
                  <center>'.strtoupper($_SESSION['nom']." ").strtoupper($_SESSION['prenom']).' - '.$donnee['date_message'].' '.$donnee['heure_message'].'</center>
                  </div>
                </div>
                  <div style="max-width:400px;border-style: solid;border-width: 1px;border-color: #337ab7;border-radius: 0 0 5px 5px;"><br>
                    <table>
                      <tr>
                        <td style="width:10%"></td>
                        <td style="text-align: justify; text-justify: inter-word;">'.$donnee['message_free'].'</td>
                        <td style="width:10%"></td>
                      </tr>
                    </table>
                    <br>
                  </div>
                  </div></h5>';




    } elseif (!empty($donnee['message_soci']) AND $derniers_msg_check >= $derniers_msg - 5) {

           echo'<h5 style="overflow: hidden;"><div style="float:right;"><div style="max-width:400px; border-width: 5px;">
                  <div class="hr-bleu" style="background-color: #088A85;border-radius: 5px 5px 0 0;">
                  <center>'.$_POST['raison_sociale'].' - '.$donnee['date_message'].' '.$donnee['heure_message'].'</center>
                  </div>
                </div>
                  <div style="max-width:400px;border-style: solid;border-width: 1px;border-color: #088A85;border-radius: 0 0 5px 5px;"><br>
                    <table>
                      <tr>
                        <td style="width:10%"></td>
                        <td style="text-align: justify; text-justify: inter-word;">'.$donnee['message_soci'].'</td>
                        <td style="width:10%"></td>
                      </tr>
                    </table>
                    <br>
                  </div>
                  </div></h5>';
    }}}}} }?>
   <hr class="hr-blue">
    <div class="hr-bleu" style="width: 60%; margin-left: 20%;border-radius: 5px 5px 0 0;">
      <span>
        <center><h3>Envoyer un nouveau message</h3></center>
      </span>
    </div>
    <form method="post">
      <div>
        <textarea name="message" class="form-control" style="border-color: #337ab7;min-height:100px;width: 60%; margin-left: 20%;border-width: 1px;border-radius: 0 0 5px 5px;" autofocus></textarea>
        <input type="submit" name="envoyer-message" class="btn btn-primary" style="position:relative; margin-top:-18px;width: 60%; margin-left: 20%;border-width: 1px;border-radius:0 0 5px 5px;" value="Envoyer">

        <?php if (!empty($_POST['id_soci'])) { ?>
        <input name="id_soci" value="<?php echo $_POST['id_soci']?>" type="hidden">
        <input name="raison_sociale" value="<?php echo $_POST['raison_sociale']?>" type="hidden">
       <?php } ?>

        <?php if (!empty($_POST['id_free'])) { ?>
        <input name="id_free" value="<?php echo $_POST['id_free']?>" type="hidden">
        <input name="nom" value="<?php echo $_POST['nom']?>" type="hidden">
        <input name="prenom" value="<?php echo $_POST['prenom']?>" type="hidden">
       <?php } ?>

      </div>
    </form>

    <div class="col-md-offset-2 col-md-8">  &nbsp;
  </div>
</div>
</body>

<script type="text/javascript">


</script>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</html>
