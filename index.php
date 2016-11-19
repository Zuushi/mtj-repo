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
            <a href="index.php"><img class="img-responsive" style="" src="img/FS5.png"></a>
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
        <center>
         <div class="principal-top">
            <a href="index.php"><img class="image-resp" src="img/FS5.png"></a>
                      <a class="lien-nav" href="index.php"><B>FREELANCE-SPHERE.COM</B></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="search" class="input-xl form-control bar-form" placeholder="Mot-clés..."><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Chercher</button> 
          <span class="sections">  
          <a class="lien-nav" href=""><B>ENGAGER UN FREELANCE</B></a>&nbsp;&nbsp;
          <a class="lien-nav" href=""><B>CONTRAT DE MISSION</B></a>&nbsp;&nbsp;
          <a class="lien-nav" href=""><B>GUIDE POUR COMMENCER</B></a>
          </span>
          <span class="sections">         
          	  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#connexion">Connexion</button>&nbsp;&nbsp;
              <a href="inscription.php"><button type="button" class="btn btn-primary">Créer un compte</button></a>
          </span>
          </div><!--/.navbar-collapse -->
        </center>
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
              <div class="fill" style="background-image:url('img/bandeau5.jpg');"></div>
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
		<center>
		    <div class="container">
		    </div>
		    <div>
		    <span><h2>Les étapes pour un départ réussi:
		    <button class="btn-choix" onclick="changeInfos2(0)">JE SUIS UN FREELANCE</button><button onclick="changeInfos(0)" class="btn-choix">JE SUIS UNE SOCIETE</button></h2></span>
		    </div><br>
		</center>
	</div>
	<div id="infos" class="resp-etapes">
			<span class="resp-numbers2">
				<img  src="img/1.png">
				<span class="resp-span">
				<B>Créez un compte</B><br><br>
					<ul>
						<li>Renseignez votre profil</li>
						<li>Passez l'épreuve d'admission</li>
						<li>Définissez vos compétences</li>
					</ul>
				</span>
			</span>					
			<span class="resp-numbers">
				<img  src="img/2.png">
				<span class="resp-span">
				<B>Déposez votre CV</B><br><br>
					<ul>
						<li>Renseignez vos expériences</li>
						<li>Déposez vos diplômes</li>
						<li>Présentez vos projets</li>
					</ul>
				</span>
			</span>					
			<span class="resp-numbers">
				<img  src="img/3.png">
				<span class="resp-span">
				<B>Postulez aux missions</B><br><br>
					<ul>
						<li>Montrez vos atouts</li>
						<li>Répondez aux attentes de vos clients</li>
						<li>Recevez vos missions par mail</li>
						<li>Concluez le contrat</li>
					</ul>
				</span>
			</span>		
	</div>
	<div id="infos2" class="resp-etapes2">
			<span class="resp-numbers2">
				<img  src="img/1.png">
				<span class="resp-span">
				<B>Créez un compte entreprise</B><br><br>
					<ul>
						<li>Renseignez les informations<br> de la société</li>
						<li>Définissez vos attentes</li>
					</ul>
				</span>
			</span>					
			<span class="resp-numbers">
				<img  src="img/2.png">
				<span class="resp-span">
				<B>Déposez votre mission</B><br><br>
					<ul>
						<li>Spécifiez les compétences<br> requises</li>
						<li>Précisez les axes de mission</li>
						<li>Présentez le projet</li>
					</ul>
				</span>
			</span>					
			<span class="resp-numbers">
				<img  src="img/3.png">
				<span class="resp-span">
				<B>Trouvez les professionnels dont vous avez besoin</B><br><br>
					<ul>
						<li>Des profils compétents dans tout les secteurs</li>
						<li>Divers critères de selection</li>
						<li>Envoyez vos offres de mission par mail</li>
						<li>Concluez le contrat</li>
					</ul>
				</span>
			</span>		
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

    <script type="text/javascript">

    function FluffyKittenMaker(SomeNumberThing)
    {
    	var infos2 = document.getElementById('infos2');
    	infos2.style.opacity = SomeNumberThing/100;
    } 

    function changeInfos(SomeNumberThing) 
    {
    	if (SomeNumberThing <= 100) 
    	{
    		document.getElementById('infos').style.visibility = "hidden";
    		document.getElementById('infos2').style.visibility = "visible";
		    FluffyKittenMaker(SomeNumberThing);
		    SomeNumberThing += 0.4;
		    window.setTimeout("changeInfos("+SomeNumberThing+")", 1);
		}
    }    

    function FluffyKitten(SomeNumberThing)
    {
    	var infos = document.getElementById('infos');
    	infos.style.opacity = SomeNumberThing/100;
    } 

    function changeInfos2(SomeNumberThing) 
    {
    	if (SomeNumberThing <= 100) 
    	{
    		document.getElementById('infos2').style.visibility = "hidden";
    		document.getElementById('infos').style.visibility = "visible";
		    FluffyKitten(SomeNumberThing);
		    SomeNumberThing += 0.4;
		    window.setTimeout("changeInfos2("+SomeNumberThing+")", 1);
		}
    }
    </script>

    <script>
      $('.carousel').carousel({
        interval: 5000 //changes the speed
      })  
    </script>
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
  </html>
