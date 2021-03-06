<?php 
  include_once('includes/co_bdd.php'); 
  session_start();
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
      if (!empty($_SESSION['mail_sess']) AND $_SESSION['type'] == 'freelance') {
        //REQUETE POUR SELECTIONNER LES INFOS DU FREELANCE CONNECTE
        $req = $bdd->prepare('SELECT * FROM mbr_free WHERE mail = :mail');
        $req->execute(array(
          'mail' => $_SESSION['mail_sess']
          ));

        $donnees = $req->fetch();
          $siret_free = $donnees['siret_free'];
          $nom = $donnees['nom'];
          $prenom = $donnees['prenom'];
          $mail = $donnees['mail'];
          $telephone = $donnees['telephone'];
          $dat_inscr = $donnees['date_inscr'];
          $test = $donnees['test'];
          $competences = $donnees['competences'];
          $site_web = $donnees['site_web'];
          $photo = $donnees['photo'];
          $tarif = $donnees['tarif'];
          $langues = $donnees['langues'];
          $localisation = $donnees['localisation'];
      } else if (!empty($_SESSION['mail_sess']) AND $_SESSION['type'] == 'societe') {

        //REQUETE POUR SELECTIONNER LES INFOS DE LA SOCIETE CONNECTE
      	 $req = $bdd->prepare('SELECT * FROM mbr_society WHERE mail = :mail');
        $req->execute(array(
          'mail' => $_SESSION['mail_sess']
          ));

        $donnees = $req->fetch();
          $raison_sociale = $donnees['raison_sociale'];
          $siret_societe = $donnees['siret'];
          $mail = $donnees['mail'];
          $password = $donnees['password'];
          $dat_inscr = $donnees['date_inscr'];
          $capital = $donnees['capital'];
          $site_web = $donnees['site_web'];
          $logo = $donnees['logo'];
          $siege_social = $donnees['siege_social'];
          $recruteur = $donnees['recruteur'];
          $caracteristiques = $donnees['caracteristiques'];
      } else {
        header("location: index.php");
      }
      include_once('navbar/navbar_user_connecte.php');
?>

<!--PROFIL FREELANCE -->
<!--PROFIL FREELANCE -->
<!--PROFIL FREELANCE -->
<!--PROFIL FREELANCE -->
<!--PROFIL FREELANCE -->
<?php if ($_SESSION['type'] == 'freelance') { ?>
<form  method="post">
<div class="container mise-en-page">

<?php if ($_SESSION['type'] == 'freelance') { ?>
    <div style="background-color: #337ab7;color: white;">
      <span>
        <center><h1>Votre PROFIL FREELANCE</h1></center>
      </span>
    </div>
        <center><?php //TRAITEMENT FORMULAIRE MISE A JOUR PROFIL FREELANCE
          include_once('includes/action.profil.php'); ?>
        </center>
    <?php } ?>
          
<?php if (empty($test) AND $_SESSION['type'] == 'freelance') { ?>
      <center>
      <div class="alert alert-danger">
          <p>Vous devez d'abord passer le QCM avant de pouvoir postuler aux missions</p><br>
          <a href="qcm.php">Faire le TEST</a>
      </div>
      </center>
<?php } ?>
<?php if (isset($_SESSION['note'])) { ?>
    	<center>
			<div class="alert alert-success">
  				<p>Merci d'avoir passé le test !</p><br>
          <p>Consultez votre note onglet Compétences !</p>
  			</div>
			</center>
<?php } ?>
<?php unset($_SESSION['note']) ?>
<center><h1><small> Informations associées à votre compte </small></h1></center>
    <div>
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <small> Date d'inscription: <?php echo $dat_inscr ?></small>
                <br>&nbsp;
            </div>
        </div>
          <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="form-group">
<img class="img-responsive" style="margin-right:2px;width: 50%;height: 50%;max-width: 170px;max-height: 150px;float: right; border-radius: 5px; border: 1px solid #337ab7;" id="photo" src="img/default.jpg">
                </div>
            </div>
        </div>
          <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="form-group">
                <label for="Url">Ajoutez l'url de votre photo !</label>
                    <input type="text" class="form-control" id="url" name="url" value="<?php echo $photo;?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-2 col-md-4">
                <div class="form-group">
                    <label for="Nom">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $nom;?>">
                </div>
            </div>
            <div class="col-md-offset-0 col-md-4">
                <div class="form-group">
                    <label for="Prenom">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $prenom;?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="form-group">
                    <label for="Email">Adresse Mail</label>
                    <input type="text" class="form-control" id="email" name="mail" value="<?php echo $mail;?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="form-group">
                    <label>N° Siret</label>
                    <input type="text" class="form-control" id="siret_free" name="siret_free" placeholder="Ex: 12 3466 5488 7755" value="<?php echo $siret_free ;?>">
                </div>
            </div>
        </div>
        <div class="row">
             <div class="col-md-offset-2 col-md-4">
                <div class="input-group">
                    <span class="input-group-addon glyphicon glyphicon-earphone"></span>
                    <input type="text" id="telephone" name="telephone" class="form-control" placeholder="Ex: 02 53 04 15 16" value="<?php echo $telephone ;?>" aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="col-md-offset-0 col-md-4">
                <div class="input-group">
                    <span class="input-group-addon glyphicon glyphicon-globe"></span>
                    <input type="text" id="localisation" name="localisation" class="form-control" value="<?php echo $localisation ;?>" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-2 col-md-4">
                <div class="form-group"><br>
                    <label for="Password">Mot de passe</label>
                    <input type="password" oninput="MAJ1();" class="form-control" id="password" name="password" placeholder="Saisir mot de passe...">
                </div>
            </div>
            <div class=" col-md-4">
                <div class="form-group"><br>
                    <label for="Vpassword"><span style="color: white; visibility: hidden">Vérification mot de passe</span></label>
                    <input type="button" name="Modifier" id="modif_pw" value="Modifier" class="btn btn-default">
                </div>
            </div>
        </div>        
        <div id="ch_new_pass"  style="visibility: hidden;" class="row">
            <div class="col-md-offset-2 col-md-4">
                <div class="form-group">
                    <label for="Password">Nouveau mot de passe</label>
                    <input type="password" oninput="checkMdp ()" class="form-control" id="npassword" name="npassword" placeholder="Saisir le mot de passe...">
                </div>
            </div>
            <div class="col-md-offset-0 col-md-4">
                <div class="form-group">
                    <label for="Vpassword">Vérification mot de passe</label>
                    <input type="password" oninput="checkMdp ()" class="form-control" id="nvpassword" name="nvpassword" placeholder="Saisir le mot de passe...">
                </div>
            </div>
        </div>
        <input type='hidden' name='profil_free' value='check1'>
        <br/>

    </div>
    	<center>
          <button class="btn btn-primary" id="btn1" title="Saisir votre mot de passe" type="submit">Mettre à jour</button>
	  </center>
</form>
	  <br>
	  &nbsp;
	  <div style="background-color: #337ab7;color: white;">
      <span>
        <center><h1>Mes COMPÉTENCES</h1></center>
      </span>
    </div>
     <form  method="post">
    <div>

        <div class="row">

            <div class="col-md-offset-2 col-md-8">
                <h1><small> Ajustez vos compétences ! </small></h1>
                <br>&nbsp;
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-2 col-md-4">
                <div class="form-group">
                    <label for="Test">Note au test</label>
                    <input type="text" class="form-control" id="test" readonly name="test" value="<?php echo $test;?>/6">
                </div>
            </div>
            <div class="col-md-offset-0 col-md-4">
                <div class="form-group">
                    <label for="Site Web">Site Web</label>
                    <input type="text" class="form-control" id="site" name="site" value="<?php echo $site_web;?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-offset-2 col-md-4">
                <div class="form-group">
                    <label for="Tarif">Votre tarif brut annuel</label>
                    <input type="text" class="form-control" id="tarif" name="tarif" value="<?php echo $tarif;?> €">
                </div>
            </div>
            <div class="col-md-offset-0 col-md-4">
                <div class="form-group">
                    <label for="Langues">Langues parlées</label>
                    <input type="text" class="form-control" id="langues" name="langues" value="<?php echo $langues;?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <div class="form-group">
                    <label for="Comptences">Vos Compétences</label>
                    <textarea type="text" class="form-control" id="competences" name="competences" style="height:150px;"><?php echo $competences;?></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-2 col-md-4">
                <div class="form-group">
                    <label for="Password">Mot de passe</label>
                    <input type="password" class="form-control" oninput="MAJ2();" id="cpassword" name="cpassword" placeholder="Saisir mot de passe...">
                </div>
            </div>
        </div>
        <br/>
<input type='hidden' name='profil_free' value='check2'>
    </div>
    	<center>
          <button class="btn btn-primary" id="btn2" title="Saisir votre mot de passe" type="submit">Mettre à jour</button>
	  </center>
</form>
 <br>
	  &nbsp;
</div>
<?php } else {?>
<!--PROFIL SOCIETE -->
<!--PROFIL SOCIETE -->
<!--PROFIL SOCIETE -->
<!--PROFIL SOCIETE =================================================-->
<!--PROFIL SOCIETE -->
<!--PROFIL SOCIETE -->

<form  method="post">
<div class="container mise-en-page">
      <div style="background-color: #337ab7;color: white;">
      <span>
        <center><h1>Votre PROFIL SOCIÉTÉ</h1></center>
      </span>
    </div>
          <center><?php //TRAITEMENT FORMULAIRE MISE A JOUR PROFIL FREELANCE
        include_once('includes/action.profil.societe.php'); ?></center>
    <div class="col-md-offset-2 col-md-8">
        <h1><small> Informations associées à votre compte recruteur</small></h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <small> Date d'inscription: <?php echo $dat_inscr ?></small>
                <br>&nbsp;
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-2 col-md-7">
                <div class="form-group">
                    <img style="float:right;width: 170px;height: 150px; border-radius: 5px; border: 1px solid #337ab7;" id="photo2" src="img/default.jpg">
                </div>
            </div>
        </div>
          <div class="row">
            <div class="col-md-offset-2 col-md-7">
                <div class="form-group">
                <label for="Url2">Ajoutez l'url de votre photo !</label>
                    <input type="text" class="form-control" id="url2" name="url2" value="<?php echo $logo;?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-2 col-md-3">
                <div class="form-group">
                    <label for="Recruteur">Recruteur</label>
                    <input type="text" class="form-control" id="recruteur" name="recruteur" value="<?php echo $recruteur;?>">
                </div>
            </div>
            <div class="col-md-offset-1 col-md-3">
                <div class="form-group">
                    <label for="Raison_sociale">Raison Sociale</label>
                    <input type="text" class="form-control" id="raison_sociale" name="raison_sociale" value="<?php echo $raison_sociale;?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-offset-2 col-md-7">
                <div class="form-group">
                    <label for="Email">Adresse Mail</label>
                    <input type="text" class="form-control" id="email_societe" name="mail_societe" value="<?php echo $mail;?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-offset-2 col-md-7">
                <div class="form-group">
                    <label>N° Siret</label>
                    <input type="text" class="form-control" id="siret_societe" name="siret_societe" placeholder="Ex: 12 3466 5488 7755" value="<?php echo $siret_societe ;?>">
                </div>
            </div>
        </div>
        <div class="row">
             <div class="col-md-offset-2 col-md-3">
                <div class="input-group">
                    <span class="input-group-addon glyphicon glyphicon-globe"></span>
                    <input type="text" id="siege_social" name="siege_social" class="form-control" value="<?php echo $siege_social ;?>" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>

         <div class="row">
            <div class="col-md-offset-2 col-md-3">
                <div class="form-group"><br>
                    <label for="Password">Mot de passe</label>
                    <input type="password" oninput="MAJ3();" class="form-control" id="password_societe" name="password_societe" placeholder="Saisir mot de passe...">
                </div>
            </div>
            <div class=" col-md-3">
                <div class="form-group"><br>
                    <label for="Vpassword"><span style="color: white; visibility: hidden">Vérification mot de passe</span></label>
                    <input type="button" name="Modifier" id="modif_pw_societe" value="Modifier" class="btn btn-default">
                </div>
            </div>
        </div>        
        <div id="ch_new_pass_societe"  style="visibility: hidden;" class="row">
            <div class="col-md-offset-2 col-md-3">
                <div class="form-group">
                    <label for="Password">Nouveau mot de passe</label>
                    <input type="password" oninput="checkMdpSociete ()" class="form-control" id="npassword_societe" name="npassword_societe" placeholder="Saisir le mot de passe...">
                </div>
            </div>
            <div class="col-md-offset-1 col-md-3">
                <div class="form-group">
                    <label for="Vpassword">Vérification mot de passe</label>
                    <input type="password" oninput="checkMdpSociete ()" class="form-control" id="nvpassword_societe" name="nvpassword_societe" placeholder="Saisir le mot de passe...">
                </div>
            </div>
        </div>

<input type='hidden' name='profil_societe' value='check3'>
        <br/>

    </div>
      <center>
          <button class="btn btn-primary" id="btn3" title="Saisir votre mot de passe" type="submit">Mettre à jour</button>
    </center>
</form>
    <br>
    &nbsp;
    <div style="background-color: #337ab7;color: white;">
      <span>
        <center><h1>Informations sur votre SOCIÉTÉ</h1></center>
      </span>
    </div>
     <form  method="post">
    <div class="container">

        <div class="row">

            <div class="col-md-offset-2 col-md-8">
                <h1><small> Définissez votre entreprise ! </small></h1>
                <br>&nbsp;
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-2 col-md-3">
                <div class="form-group">
                    <label for="Capital">Capital de votre entreprise</label>
                    <input type="text" class="form-control" id="capital" name="capital" value="<?php echo $capital;?> €">
                </div>
            </div>
            <div class="col-md-offset-1 col-md-3">
                <div class="form-group">
                    <label for="Site Web">Site Web</label>
                    <input type="text" class="form-control" id="site_societe" name="site_societe" value="<?php echo $site_web;?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-offset-2 col-md-7">
                <div class="form-group">
                    <label for="Caracteristiques">Présentez votre entreprise !</label>
                    <textarea type="text" class="form-control" id="caracteristiques" name="caracteristiques" style="height:150px;"><?php echo $caracteristiques;?></textarea>
                </div>
            </div>
            <div class="col-md-offset-2 col-md-3">
                <div class="form-group"><br>
                    <label for="Password">Mot de passe</label>
                    <input type="password" oninput="MAJ4();" class="form-control" id="cpassword_societe" name="cpassword_societe" placeholder="Saisir mot de passe...">
                </div>
            </div>
        </div>
<input type='hidden' name='profil_societe' value='check4'>
        <br/>

    </div>
      <center>
          <button class="btn btn-primary" id="btn4" title="Saisir votre mot de passe" type="submit">Mettre à jour</button>
    </center>
</form>
 <br>
    &nbsp;
</div>
<?php } ?>
</body>

<script type="text/javascript">
	 function deco () {
      window.location= "deconnexion/deco.php";
    }

  function MAJ1 () {
    document.getElementById('btn1').disabled = true;
    if (document.getElementById('password').value != "") {
      document.getElementById('btn1').disabled = false;
    }
  }

  function MAJ2 () {
    document.getElementById('btn2').disabled = true;
    if (document.getElementById('cpassword').value != "") {
      document.getElementById('btn2').disabled = false;
    }
  }
    
  function MAJ3 () {
    document.getElementById('btn3').disabled = true;
    if (document.getElementById('password_societe').value != "") {
      document.getElementById('btn3').disabled = false;
    }
  }

  function MAJ4 () {
    document.getElementById('btn4').disabled = true;
    if (document.getElementById('cpassword_societe').value != "") {
      document.getElementById('btn4').disabled = false;
    }
  }

  function Photo () {
    if (document.getElementById('url').value != "") {
      document.getElementById('photo').src = document.getElementById('url').value;
    }
  }  
  function Photo2 () {
    if (document.getElementById('url2').value != "") {
      document.getElementById('photo2').src = document.getElementById('url2').value;
    }
  }

//EXECUTE CES FONCTIONS AU CHARGEMENT DE LA PAGE
  function helloProfil () {
    var type = "<?php echo $_SESSION['type']?>";
    if (type == 'freelance') {
      MAJ1();
      MAJ2();
      Photo();
    } else {
      MAJ3();
      MAJ4();
      Photo2();
    }
  }

      function checkMdp ()
    {
        var mdp = document.getElementById('npassword');
        var vmdp = document.getElementById('nvpassword');
        if (mdp.value != vmdp.value) 
        {
            mdp.style.borderColor = "#DD546D";
            vmdp.style.borderColor = "#DD546D"; //rouge
        }

        else if (mdp.value == "" && mdp.value == "")
        {
            mdp.style.borderColor = "#CCC";
            vmdp.style.borderColor = "#CCC"; //gris
        }

        else if (mdp.value != "" && vmdp.value != "" && mdp.value == vmdp.value)
        {
            mdp.style.borderColor = "#64FE2E";
            vmdp.style.borderColor = "#64FE2E"; //vert 
        }
    }      

    function checkMdpSociete ()
    {
        var mdp = document.getElementById('npassword_societe');
        var vmdp = document.getElementById('nvpassword_societe');
        if (mdp.value != vmdp.value) 
        {
            mdp.style.borderColor = "#DD546D";
            vmdp.style.borderColor = "#DD546D"; //rouge
        }

        else if (mdp.value == "" && mdp.value == "")
        {
            mdp.style.borderColor = "#CCC";
            vmdp.style.borderColor = "#CCC"; //gris
        }

        else if (mdp.value != "" && vmdp.value != "" && mdp.value == vmdp.value)
        {
            mdp.style.borderColor = "#64FE2E";
            vmdp.style.borderColor = "#64FE2E"; //vert 
        }
    }

  window.onload = helloProfil;

</script>

<script>
  $( "#modif_pw" ).on( "click", function() {
    $( "#ch_new_pass" ).css({opacity: 0.0, visibility: "visible"}).animate({opacity: 1}, 800);
  });  
  $( "#modif_pw_societe" ).on( "click", function() {
    $( "#ch_new_pass_societe" ).css({opacity: 0.0, visibility: "visible"}).animate({opacity: 1}, 800);
  });
</script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>