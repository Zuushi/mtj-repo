<?php
session_start();
include_once('includes/co_bdd.php');
include_once('includes/traitement_co_free.php');
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
  <link rel="icon" href="../favicon.ico">

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

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>

    <body>

      <?php

      //BARRE MENU UTILISATEUR CONNECTE
      if (!empty($_SESSION['mail_sess'])) 

      {

        $req = $bdd->prepare('SELECT prenom FROM mbr_free WHERE mail = :mail');
        $req->execute(array(
          'mail' => $_SESSION['mail_sess']
          ));

        $donnees = $req->fetch();

        ?>
      <nav class="navbar navbar-inverse">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a href="index.php"><img class="img-responsive" style="" src="img/Sphere4.png"></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
           <?php echo '<p id="p_co">Bonjour ' .$donnees['prenom']. '<br /> <a href="deco.php">Déconnexion</a></p>'; ?>
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
         <div class="principal-top">
          <div class="navbar-header">
            <a href="index.php"><img class="img-responsive" style="" src="img/Sphere4.png"></a>
          </div>
          <input type="search" class="input-xl form-control bar-form" placeholder="Mot-clés..."><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Chercher</button>
          <a class="lien-nav" href=""><B>TROUVER UN FREELANCE</B></a>
          <a class="lien-nav" href=""><B>TROUVER UNE MISSION</B></a>
            <form class="barre-de-recherche">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#connexion">Connexion</button>
              <a href="inscription.php"><button type="button" class="btn btn-primary">Créer un compte</button></a>
            </form> 
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
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h3 class="col-md-offset-4">Connexion...</h3>
            </div>
            <!-- Contenu de l'inscription Freelance-->

            <form method="post" action="">

              <div class="modal-body">
                <div class="row">
                  <div class="col-md-offset-2 col-md-7">
                    <div class="form-group">
                      <label for="Email">Adresse Mail</label>
                      <input type="text" class="form-control" name="email" placeholder="Entrez l'email">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-offset-2 col-md-7">
                    <div class="form-group">
                      <label for="Password">Mot de passe</label>
                      <input type="password" class="form-control" name="password" placeholder="Mot de passe">
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Retour</button>
                <button type="submit" class="btn btn-primary">Connexion</button>
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

      <div class="full_slide">
        <header id="myCarousel" class="carousel slide">
          <!-- Wrapper for Slides -->
          <div class="carousel-inner">
            <div class="item active">
              <!-- Set the first background image using inline CSS below. -->
              <div class="fill" style="background-image:url('img/bandeau1.jpg');"></div>
            </div>
            <div class="item">
              <!-- Set the second background image using inline CSS below. -->
              <div class="fill" style="background-image:url('img/bandeau2.png');"></div>
            </div>       
            <div class="item">
              <div class="fill" style="background-image:url('img/bandeau4.jpg');"></div>
            </div>
          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
          </a>

        </header>
      </div>

      <div>
        <!-- Example row of columns -->
<div class="mid-principal">
    <div class="container">
    </div>
    <div>
    <span class="center-title"><h2>Les étapes pour un départ réussi:
    <button class="btn-choix">JE SUIS UN FREELANCE</button><button class="btn-choix">JE SUIS UN FREELANCE</button></h2></span>
    </div><br>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <hr>
<div class="mid-principal">
    <div class="container">
<div class="clear"></div>
    </div>
    <div>
    <br><br>
    <center><h1>Nos partenaires : &nbsp;
    	<img class="part" src="img/logo_part/air-logo.png">&nbsp;&nbsp;
    	<img class="part2" src="img/logo_part/logo-etat.png">&nbsp;&nbsp;
    	<img class="part2" src="img/logo_part/sophia-logo1.png">&nbsp;&nbsp;
    	<img class="part2" src="img/logo_part/eurocop.png">&nbsp;&nbsp;
    </h1></center>
        <br clear="all"><br><br>
    </div>
</div>
<div class="footer-principal">
    <div class="container">
<div class="clear"></div>
    </div>
        <div class="container">
            <div class="col-lg-12">
                <br />
                <a href="https://www.facebook.com"><img class="logo-icon" src="img/fb.png"></a>
                <a href="https://https://twitter.com/?lang=fr"><img class="logo-icon" src="img/Twitter.png"></a>
                <a href="https://getbootstrap.com"><img class="logo-icon" src="img/Boostrap.png"></a>
                <a href="https://www.youtube.fr"><img class="logo-icon" src="img/Youtube.png"></a>
                <a href="https://www.google.fr"><img class="logo-icon2" src="img/google.png"></a>
                <span style="position:relative;top:6px;left:5%;font-size:30px;">Suivez-nous sur les différentes plateformes!</span>
            </div>
        </div>
    <hr class="hrwhite">
    <div class="container">
        <div class="homemenu">
            <div class="col-md-4 col-lg-4 footerblokk">
                <div class="tittle">Services aux sociétés:</div>
                <div><a href="/fr/corp">- freelance.com/CORP</a></div>
                <div><a href="/fr/direct">- freelance.com/DIRECT</a></div>
                <div><a href="/fr/interco">- freelance.com/INTERCO</a></div>
            </div>
            <div class="col-md-4 col-lg-4 footerblokk">
                <div class="tittle">Services aux freelances:</div>
                <div><a href="/fr/contents/vigielance">- Provigis</a></div>
                <div><a href="/fr/contents/valor-portage-com">- Portage Salarial</a></div>
            </div>
            <div class="col-md-4 col-lg-4 footerblokk">
                <div class="tittle">FAQ:</div>
                <div>
                    
                    
                        
                    
                    <a href="http://freelance-sphere.com/?">- FAQ pour les sociétés</a>
                </div>
                <div>
                    
                    
                        
                    
                    <a href="http://support.freelance.com/hc/fr/sections/200513328-Documentation-freelance">- FAQ pour les freelances</a>
                </div>
            </div>
            <br clear="all"><br><br>
            <div class="col-md-4 col-lg-4 footerblokk">
                <div class="tittle">Contactez-nous:</div>
                
                
                    
                
                <div><a href="/fr/contents/nous-contacter#headquarters">- Siège social</a></div>
                <div>
                    
                    
                        
                    
                    <a href="http://support.freelance.com/hc/fr/requests/new">- Un problème technique</a>
                </div>
                <div><a href="/fr/contents/nous-contacter#workWithUs">- Travailler chez freelance-sphere.com</a></div>
            </div>
            <div class="col-md-4 col-lg-4 footerblokk">
                <div class="tittle">Investisseurs:<a href="mailto:investisseurs@freelance.com" class="expose"> investisseurs@freelance-sphere.com</a></div>
                <div>
                    
                    
                        
                    
                    <a href="/fr/contents/investisseurs">- Quelques chiffres clés</a>
                </div>
                <div>
                    <a href="/fr/contents/informations-reglementees">- Informations réglementées</a>
                </div>
                <div>
                    <a href="/fr/contents/espace-actionnaires">- Espace actionnaires</a>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 footerblokk">
                <div class="tittle">Qui sommes-nous?:</div>
                <div>
                    
                    
                        
                    
                    <a href="/fr/contents/a-propos-de-freelance-com">- A propos de freelance-sphere.com</a>
                </div>
                
         
                <div>
                    
                    
                        
                    
                    <a href="/fr/contents/l-equipe-de-direction">- Notre équipe de professionnels</a>
                </div>
                <div>
                    
                    
                        
                    
                    <a href="/fr/contents/temoignages">- Témoignages</a>
                </div>
                <div><a href="/fr/contents/terms">- Mentions légales</a></div>
            </div>
        </div>
        <br clear="all"><br><br>
    </div>
</div>
      </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <script>
      $('.carousel').carousel({
        interval: 5000 //changes the speed
      })  
    </script>
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
  </html>
