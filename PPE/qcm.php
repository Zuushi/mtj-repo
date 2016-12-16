<?php
include_once('includes/co_bdd.php');
session_start();

?>

<?php
      //REDIRIGE SI UTILISATEUR NON CONNECTE
      if (empty($_SESSION['mail_sess'])) {
        header("location: index.php");
      }
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

    <!-- Custom CSS -->
    <link href="css/full-slider.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
    <link rel="icon" href="img/ico.png">

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>


    <body class="my_background bg-color-inscription">
    <div class="col-md-offset-3 col-md-8 mise-en-page">
        <div class="row">
            <div class="col-md-12">
                <a href="index.php"><img class="img-responsive img-placement" src="img/FS5.png"></a>
                <a class="lien-nav" href="index.php"><B>FREELANCE-SPHERE.COM</B></a><br><br>
                <span class="text-bold"><?php echo 'Bonjour '.$_SESSION['prenom'].' !'; ?></span><br/>
                <span class="text-bold">Vous devez passer ce questionnaire pour valider votre inscription !</span><br/><br/>
            </div>            
            <div class="col-md-12">
        <form method="post" id="qcmnote" name="qcmnote" action="qcm.note.php">
                    <?php include_once("includes/genere_qcm.php"); ?>
                    <input type="hidden" name="thenote" id="thenote">
            </div>
                <div>
                    <center>
                        <br/><div>&nbsp;</div>
                        <button type="button" class="btn btn-primary" onclick="Retour();">Retour</button>
                        <button type="button" class="btn btn-primary" onclick="valider();">Valider</button>
                        <br/><div>&nbsp;</div>
                    </center>
                </div>
        </form>
        </div>
    <div>
</body>

<script language="JavaScript" type="text/javascript">
</script>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
    
function Retour ()
{
    window.location = "index.php";
}

function note () {
    var a = document.getElementById('0');
    var b = document.getElementById('1');
    var c = document.getElementById('2');
    var d = document.getElementById('3');
    var e = document.getElementById('4');
    var f = document.getElementById('5');
    var note = 0;

    if (a.checked === true) {
        note = note + 1;
    }
    if (b.checked === true) {
        note = note + 1;
    }
    if (c.checked === true) {
        note = note + 1;
    }
    if (d.checked === true) {
        note = note + 1;
    }
    if (e.checked === true) {
        note = note + 1;
    }
    if (f.checked === true) {
        note = note + 1;
    }
    console.log(note);
    return note;
}

function valider () {
    var nota = note();
    if (confirm('Valider vos réponses ?')) {
        document.getElementById('thenote').value = parseInt(nota);
        var qcmnote = window.document.qcmnote;
        qcmnote.submit();
    }
}

</script>

</html>