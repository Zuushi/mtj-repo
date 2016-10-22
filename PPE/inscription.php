<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Voyage pas cher, vacances!</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/full-slider.css" rel="stylesheet">

        <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="my_background">
<form action="action.inscription.php" method="post">
    <div class="container">

        <div class="row">

            <div class="col-md-offset-2 col-md-8">
                <a href="index.php"><img style="width:130px; height:100px;" src="images/log.png"></a>
                <h1> Inscription <br/> <small> Merci de renseigner vos informations </small></h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-offset-2 col-md-3">
                <div class="form-group">
                    <label for="Nom">Nom</label>
                    <input type="text" class="form-control" id="nom" placeholder="Nom">
                </div>
            </div>
            <div class="col-md-offset-1 col-md-3">
                <div class="form-group">
                    <label for="Prenom">Prénom</label>
                    <input type="text" class="form-control" id="prenom" placeholder="Prénom">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-offset-2 col-md-7">
                <div class="form-group">
                    <label for="Email">Email address</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter email">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-offset-2 col-md-3">
                <div class="form-group">
                    <label for="Password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" placeholder="Mot de passe">
                </div>
            </div>
            <div class="col-md-offset-1 col-md-3">
                <div class="form-group">
                    <label for="Vpassword">Vérification mot de passe</label>
                    <input type="password" class="form-control" id="vpassword" placeholder="Vérification mot de passe">
                </div>
            </div>
        </div>

        <div class="row">
             <div class="col-md-offset-2 col-md-3">
                <div class="input-group">
                    <span class="input-group-addon glyphicon glyphicon-earphone"></span>
                    <input type="text" id="téléphone" class="form-control" placeholder="téléphone" aria-describedby="basic-addon1">
                </div>
                <div class="input-group">
                    <span class="input-group-addon glyphicon glyphicon-globe"></span>
                    <input type="text" id="adresse" class="form-control" placeholder="adresse" aria-describedby="basic-addon1">
                </div>
            </div>
        </div>

        <br/>
        <div class="row">
            <div class="col-md-offset-5 col-md-1">
                <a href="index.php"><button type="button" class="btn btn-primary" style="margin-left:-295px;margin-top:2px;margin-bottom:2px;background-color:#4D0C92; border-color:#545A81;">Retour</button></a>
                <button type="submit" class="btn btn-primary" style="margin-left:200px;margin-top:2px;margin-bottom:2px;background-color:#4D0C92; border-color:#545A81;">M'inscrire</button>
            </div>
        </div>

    </div>
</form>
</body>
</html>