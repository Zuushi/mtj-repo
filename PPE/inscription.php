<?php
include_once('includes/co_bdd.php');



?>


<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PPE Site Freelance</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/full-slider.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="PPE/jumbotron.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body class="my_background">
        <form action="" method="post">
            <div class="container">

                <div class="row">

                    <div class="col-md-offset-2 col-md-8">
                        <a href="index.php"><img style="width:130px; height:100px;" src="images/log.png"></a>
                        <h1> Inscription <br/> <small> Vous êtes... </small></h1>
                    </div>
                </div>

                <!-- Boutton Freelance -->
                <button type="button" class="btn btn-primary btn-lg col-md-offset-2" data-toggle="modal" data-target="#freelance">
                  Freelance
              </button>
              <!-- Boutton Societe -->
              <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#societe">
                  Société
              </button>

              <!-- FREELANCE -->
              <div class="modal fade" id="freelance" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Je suis un Freelance...</h4>
                    </div>
                    <!-- Contenu de l'inscription Freelance-->
                    <div class="modal-body">
                     <div class="row">
                        <div class="col-md-offset-2 col-md-7">
                            <div class="form-group">
                                <label for="Nom">Nom</label>
                                <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom">
                            </div>
                        </div>
                        <div class="col-md-offset-2 col-md-7">
                            <div class="form-group">
                                <label for="Prenom">Prénom</label>
                                <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prénom">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-offset-2 col-md-7">
                            <div class="form-group">
                                <label for="Email">Adresse Mail</label>
                                <input type="mail" class="form-control" name="email" id="email" placeholder="Entrez l'email">
                            </div>
                        </div>
                        <div class="col-md-offset-2 col-md-7">
                            <div class="form-group">
                                <label for="Email">Vérification Mail</label>
                                <input type="mail" class="form-control" name="v_email" id="v_email" placeholder="Entrez de nouveau l'email">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-offset-2 col-md-7">
                            <div class="form-group">
                                <label for="Password">Mot de passe</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe">
                            </div>
                        </div>
                        <div class="col-md-offset-2 col-md-7">
                            <div class="form-group">
                                <label for="Vpassword">Vérification mot de passe</label>
                                <input type="password" class="form-control" name="v_password" id="v_password" placeholder="Vérification mot de passe">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Retour</button>
                    <button type="submit" class="btn btn-primary">S'inscrire</button>
                </div>
            </div>
        </div>
    </div>
    <!-- SOCIETE -->
    <div class="modal fade" id="societe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Je représente une Société...</h4>
        </div>
        <!-- Contenu de l'inscription Societe -->
        <div class="modal-body">
          <div class="modal-body">
             <div class="row">
                <div class="col-md-offset-2 col-md-7">
                    <div class="form-group">
                        <label for="Raison Sociale">Raison Sociale</label>
                        <input type="text" class="form-control" name="raison_sociale" placeholder="Raison Sociale">
                    </div>
                </div>
                <div class="col-md-offset-2 col-md-7">
                    <div class="form-group">
                        <label for="Siret">N° Siret</label>
                        <input type="text" class="form-control" name="siret" placeholder="Numéro Siret">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-offset-2 col-md-7">
                    <div class="form-group">
                        <label for="Email">Adresse Mail</label>
                        <input type="text" class="form-control" name="email_societe" placeholder="Entrez l'email">
                    </div>
                </div>
                <div class="col-md-offset-2 col-md-7">
                    <div class="form-group">
                        <label for="Email">Vérification Mail</label>
                        <input type="text" class="form-control" name="vemail_societe" placeholder="Entrez de nouveau l'email">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-offset-2 col-md-7">
                    <div class="form-group">
                        <label for="Password">Mot de passe</label>
                        <input type="password" class="form-control" name="password_societe" placeholder="Mot de passe">
                    </div>
                </div>
                <div class="col-md-offset-2 col-md-7">
                    <div class="form-group">
                        <label for="Vpassword">Vérification mot de passe</label>
                        <input type="password" class="form-control" name="vpassword_societe" placeholder="Vérification mot de passe">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Retour</button>
            <button type="submit" class="btn btn-primary">S'inscrire</button>
        </div>
    </div>
</div>
</div>

<br/>

</div>
</form>

</body>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<?php
//TRAITEMENT FORMULAIRE INSCR FREELANCE AVEC AFFICHAGE ERREURS OU AFFICHAGE INSCR OK
include_once('includes/add_mbr_free.php'); 
?>
</html>