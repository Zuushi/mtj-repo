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
  <link rel="icon" href="../../favicon.ico">

  <title>PPE Site Freelance</title>

  <!-- Bootstrap core CSS -->
  <link href="../PPE/dist/css/bootstrap.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="css/full-slider.css" rel="stylesheet">

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="../PPE/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="jumbotron.css" rel="stylesheet">

  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
  <script src="../PPE/assets/js/ie-emulation-modes-warning.js"></script>

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
            <form class="navbar-form navbar-right">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#connexion">Connexion</button>
              <a href="inscription.php"><button type="button" class="btn btn-primary">Inscription</button></a>
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
              <div class="fill" style="background-image:url('img/reseau.jpg');"></div>
            </div>
            <div class="item">
              <!-- Set the second background image using inline CSS below. -->
              <div class="fill" style="background-image:url('img/focus.jpg');"></div>
            </div>
            <div class="item">
              <div class="fill" style="background-image:url('img/webd.jpg');"></div>
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

      <div class="container">
        <!-- Example row of columns -->
        <div class="row">
          <div class="col-md-4">
            <h2>Heading</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
          </div>
          <div class="col-md-4">
            <h2>Heading</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
          </div>
          <div class="col-md-4">
            <h2>Heading</h2>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
          </div>
        </div>

        <hr>

        <footer>
          <p>&copy; 2016 Company, Inc.</p>
        </footer>
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
    <script src="../PPE/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
  </html>
