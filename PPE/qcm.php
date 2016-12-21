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

<?php 
  include_once('includes/header.php'); 
?>


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
        <form method="post" id="qcmnote" name="qcmnote" action="includes/qcm.note.php">
                    <?php 
                        // ON GENERE LE QCM PAR CE FICHIER
                        include_once("includes/genere_qcm.php");
                    ?>
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
    if (nota != "") {
        if (confirm('Valider vos réponses ?')) {
            document.getElementById('thenote').value = parseInt(nota);
            var qcmnote = window.document.qcmnote;
            qcmnote.submit();
        }
    } else {
        alert('vous devez au moins selectionné une réponse !');
    }
}

</script>

</html>