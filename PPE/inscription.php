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

    <!-- Custom CSS -->
    <link href="css/full-slider.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>


    <body class="my_background">

<form name="inscrit_free" id="inscrit_free" autocomplete="off" method="post" action="">
            <div class="container">
                <?php 
                //TRAITEMENT FORMULAIRE INSCR FREELANCE AVEC AFFICHAGE ERREURS OU AFFICHAGE INSCR OK
                include_once('includes/add_mbr_free.php'); 
                ?>
                <div class="row">

                    <div class="col-md-offset-2 col-md-8">
                        <a href="index.php"><img style="" src="img/Sphere4.png"></a>
                        <h1> Inscription <br/> <small> Vous êtes... </small></h1>
                    </div>
                </div>

                <!-- Boutton Freelance -->
                <button type="button" onclick="disableButton()" class="btn btn-primary btn-lg col-md-offset-2" data-toggle="modal" data-target="#freelance">
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
                                <label for="Nom">Nom<img id="ico0" class="ico-img" src=""></label>
                                <input type="text" class="form-control" oninput="checker(document.getElementById('nom'),document.getElementById('ico0'));" name="nom" id="nom" placeholder="Nom">
                            </div>
                        </div>
                        <div class="col-md-offset-2 col-md-7">
                            <div class="form-group">
                                <label for="Prenom">Prénom<img id="ico1" class="ico-img" src=""></label>
                                <input type="text" class="form-control" oninput="checker(document.getElementById('prenom'),document.getElementById('ico1'));" name="prenom" id="prenom" placeholder="Prénom">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-offset-2 col-md-7">
                            <div class="form-group">
                                <label for="Email">Adresse Mail<img id="ico2" class="ico-img" src=""></label>
                                <input type="mail" class="form-control" oninput="checkerMail(document.getElementById('email'),document.getElementById('v_email'),document.getElementById('ico2'),document.getElementById('ico3'));" name="email" id="email" placeholder="Entrez l'email">
                            </div>
                        </div>
                        <div class="col-md-offset-2 col-md-7">
                            <div class="form-group">
                                <label for="Email">Vérification Mail<img id="ico3" class="ico-img" src=""></label>
                                <input type="mail" class="form-control" oninput="checkerMail(document.getElementById('email'),document.getElementById('v_email'),document.getElementById('ico2'),document.getElementById('ico3'));" name="v_email" id="v_email" placeholder="Entrez de nouveau l'email">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-offset-2 col-md-7">
                            <div class="form-group">
                                <label for="Password">Mot de passe<img id="ico4" class="ico-img" src=""></label>
                                <input type="password" class="form-control" oninput="checkerMdp(document.getElementById('password'),document.getElementById('v_password'),document.getElementById('ico4'),document.getElementById('ico5'));" name="password" id="password" placeholder="Mot de passe">
                            </div>
                        </div>
                        <div class="col-md-offset-2 col-md-7">
                            <div class="form-group">
                                <label for="Vpassword">Vérification mot de passe<img id="ico5" class="ico-img" src=""></label>
                                <input type="password" class="form-control" oninput="checkerMdp(document.getElementById('password'),document.getElementById('v_password'),document.getElementById('ico4'),document.getElementById('ico5'));" name="v_password" id="v_password" placeholder="Vérification mot de passe">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Retour</button>
                    <button type="submit" id="sub-button" class="btn btn-primary">S'inscrire</button>
                </div>
            </div>
        </div>
    </div>
</form>
<form autocomplete="off" method="post" action="add_mbr_soci.php">
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
                        <label for="Raison Sociale">Raison Sociale<img id="ico11" class="ico-img" src=""></label>
                        <input type="text" class="form-control" oninput="checkerRs(document.getElementById('raison_sociale'),document.getElementById('ico11'));" id="raison_sociale" name="raison_sociale" placeholder="Raison Sociale">
                    </div>
                </div>
                <div class="col-md-offset-2 col-md-7">
                    <div class="form-group">
                        <label for="Siret">N° Siret<img id="ico10" class="ico-img" src=""></label>
                        <input type="text" class="form-control" oninput="checkerSiret(document.getElementById('siret'),document.getElementById('ico10'));" id="siret" name="siret" placeholder="Numéro Siret">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-offset-2 col-md-7">
                    <div class="form-group">
                        <label for="Email">Adresse Mail<img id="ico6" class="ico-img" src=""></label>
                        <input type="text" class="form-control" oninput="checkerMail(document.getElementById('semail'),document.getElementById('vsemail'),document.getElementById('ico6'),document.getElementById('ico7'));" id="semail" name="email_societe" placeholder="Entrez l'email">
                    </div>
                </div>
                <div class="col-md-offset-2 col-md-7">
                    <div class="form-group">
                        <label for="Email">Vérification Mail<img id="ico7" class="ico-img" src=""></label>
                        <input type="text" class="form-control" oninput="checkerMail(document.getElementById('semail'),document.getElementById('vsemail'),document.getElementById('ico6'),document.getElementById('ico7'));" id="vsemail" name="vemail_societe" placeholder="Entrez de nouveau l'email">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-offset-2 col-md-7">
                    <div class="form-group">
                        <label for="Password">Mot de passe<img id="ico8" class="ico-img" src=""></label>
                        <input type="password" class="form-control" oninput="checkerMdp(document.getElementById('smdp'),document.getElementById('vsmdp'),document.getElementById('ico8'),document.getElementById('ico9'));" id="smdp" name="password_societe" placeholder="Mot de passe">
                    </div>
                </div>
                <div class="col-md-offset-2 col-md-7">
                    <div class="form-group">
                        <label for="Vpassword">Vérification mot de passe<img id="ico9" class="ico-img" src=""></label>
                        <input type="password" class="form-control" oninput="checkerMdp(document.getElementById('smdp'),document.getElementById('vsmdp'),document.getElementById('ico8'),document.getElementById('ico9'));" id="vsmdp" name="vpassword_societe" placeholder="Vérification mot de passe">
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

<script language="JavaScript" type="text/javascript">

//Si un chiffre ou + est saisi return TRUE
function hasNumbers(t)
{
    return /\d/.test(t);
}

//Vérifie la saisie du champ raison sociale
function checkerRs (x,y)
{
    var test = x.value; // contient la saisie du champ
    var test2 = x; // test2 est enfaite l'input; il sert a modifier sa .value .style etc...
    var ico = y; // recupère l'id de l'icone en argument
    var ok = false; // variable booléenne renvoyé par la fonction

    //On test si la saisie contient des chiffres et n'est pas vide
    if (test == "")
    {
        test2.style.backgroundColor = "#F5A9A9"; //rouge
        ico.src = "img/invalid.gif";
    }
    else
    {
        test2.style.backgroundColor = "#BCF5A9"; //vert
        ico.src = "img/valid.svg";
        ok = true; // le nom saisi est valide, on assigne vrai a ok
    }
    return ok;
}

//Vérifie la saisie du champ nom et prenom
function checker (x,y)
{
    var test = x.value; // contient la saisie du champ
    var test2 = x; // test2 est enfaite l'input; il sert a modifier sa .value .style etc...
    var ico = y; // recupère l'id de l'icone en argument
    var ok = false; // variable booléenne renvoyé par la fonction
    var nom = document.getElementById('nom').style.backgroundColor;
    var prenom = document.getElementById('prenom').style.backgroundColor;

    //On test si la saisie contient des chiffres et n'est pas vide
    if (hasNumbers(test) && test != "")
    {
        test2.style.backgroundColor = "#F5A9A9"; //rouge
        ico.src = "img/invalid.gif";
    }
    else
    {
        test2.style.backgroundColor = "#BCF5A9"; //vert
        ico.src = "img/valid.svg";
        if (nom == prenom)
        {
            ok = true; // le nom et prenom saisis sont valide, on assigne vrai a ok
        }
    }
    if (test == "")
    {
       test2.style.backgroundColor = "white"; 
       ico.src = "";
    }
    return ok; // on retourne le booléen
}

//Vérifie la saisie du N° Siret qui ne doit contenir que des chiffres
function checkerSiret (x,y)
{
    var test = x.value; // contient la saisie du champ N°Siret
    var test2 = x;
    var ico = y;
    var ok = false; // variable booléenne renvoyé par la fonction

    //On test si la saisie contient des chiffres et n'est pas vide
    if (hasNumbers(test) && test != "")
    {
        test2.style.backgroundColor = "#BCF5A9"; //vert
        ico.src = "img/valid.svg";
        ok = true; // le nom saisi est valide, on assigne vrai a ok
    }
    else
    {
        test2.style.backgroundColor = "#F5A9A9"; //rouge
        ico.src = "img/invalid.gif";
    }
    if (test == "")
    {
       test2.style.backgroundColor = "white"; 
       ico.src = "";
    }
    return ok;
}

//Vérifie si la saisie de l'email : exemple@exemple.ex
function validateEmail(email) 
{
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}

//Vérifie si la saisie des deux emails correspondent
function checkerMail (v,x,y,z)
{
    var mail = v.value; // contient la saisie du champ email
    var bmail = v; // bmail est enfaite l'input; il sert a modifier sa .value .style etc...
    var vmail = x.value; // contient la saisie du champ vérification email
    var bvmail = x; // bvmail est enfaite l'input; il sert a modifier sa .value .style etc...
    var ico = y; // recupère l'id de l'icone en argument
    var ico2 = z; 
    var ok = false; // variable booléenne renvoyé par la fonction
    var email = document.getElementById('email').style.backgroundColor;
    var v_email = document.getElementById('v_email').style.backgroundColor;

    //On test si la saisie contient des chiffres et n'est pas vide
    if (mail == vmail && mail != "" && vmail != "" &&validateEmail(mail) && validateEmail(vmail))
    {
        bmail.style.backgroundColor = "#BCF5A9"; //vert
        ico.src = "img/valid.svg";        
        bvmail.style.backgroundColor = "#BCF5A9"; //vert
        ico2.src = "img/valid.svg";

        if ( email == v_email)
        {
            ok = true; // le nom saisi est valide, on assigne vrai a ok
        }
    }
    else if (mail != "" && vmail != "")
    {
        bmail.style.backgroundColor = "#F5A9A9"; //rouge
        ico.src = "img/invalid.gif";       
        bvmail.style.backgroundColor = "#F5A9A9"; //rouge
        ico2.src = "img/invalid.gif";
    }

    if (mail == "" && vmail == "" || vmail == "" || mail == "")
    {
       bmail.style.backgroundColor = "white"; 
       ico.src = "";       
       bvmail.style.backgroundColor = "white"; 
       ico2.src = "";
    }
    return ok;
}

//Vérifie si la saisie des deux mot de passe correspondent
function checkerMdp (v,x,y,z)
{
    var mdp = v.value; // contient la saisie du champ mot de passe 
    var bmdp = v; // bmdp est enfaite l'input; il sert a modifier sa .value .style etc...
    var vmdp = x.value; // contient la saisie du champ vérification mot de passe
    var bvmdp = x; // bvmdp est enfaite l'input; il sert a modifier sa .value .style etc...
    var ico = y; // recupère l'id de l'icone en argument
    var ico2 = z;
    var ok = false; // variable boolénne renvoyé par la fonction
    var password = document.getElementById('password').style.backgroundColor;
    var v_password = document.getElementById('v_password').style.backgroundColor;

    if (mdp == vmdp && mdp != "" && vmdp != "") // vérifie si les mdp correspondent, il faudrait ajouter des conditions de mdp: 1Maj, 1chiffre, etc...
    {
        bmdp.style.backgroundColor = "#BCF5A9"; //vert
        ico.src = "img/valid.svg";        
        bvmdp.style.backgroundColor = "#BCF5A9"; //vert
        ico2.src = "img/valid.svg";
        if (password == v_password)
        {
            ok = true; // less emails saisies sont valide, on assigne vrai a ok
            var b = document.getElementById("sub-button").disabled = false;
        }
    }
    else if (mdp != "" && vmdp != "")
    {
        bmdp.style.backgroundColor = "#F5A9A9"; //rouge
        ico.src = "img/invalid.gif";        
        bvmdp.style.backgroundColor = "#F5A9A9"; //rouge
        ico2.src = "img/invalid.gif";
    }

    if (mdp == "" && vmdp == ""|| vmdp == "" || mdp == "")
    {
       bmdp.style.backgroundColor = "white"; 
       ico.src = "";       
       bvmdp.style.backgroundColor = "white"; 
       ico2.src = "";
    }
    return ok;
}

function disableButton ()
{
    var b = document.getElementById("sub-button").disabled = true;
}

/*function inscritFreelance()
{ 
    var form_free=window.document.inscrit_free;
    var nom = document.getElementById('nom');
    var prenom = document.getElementById('prenom');
    var password = document.getElementById('password');
    var v_password = document.getElementById('v_password');
    var email = document.getElementById('email');
    var v_email = document.getElementById('v_email');
    var ico0 = document.getElementById('ico0');
    var ico1 = document.getElementById('ico1');
    var ico2 = document.getElementById('ico2');
    var ico3 = document.getElementById('ico3');
    var ico4 = document.getElementById('ico4');
    var ico5 = document.getElementById('ico5');
    // si tout les champs sont valides
    if (checker(nom,ico0) === true && checker(prenom,ico1) === true && checkerMail(email,v_email,ico2,ico3) === true && checkerMdp(password,v_password,ico4,ico5) === true)
    {
          var b = document.getElementById("sub-button").disabled = true;
    } else {
        alert("Tout les champs ne sont pas remplis ou ne sont pas valide!");
    }
}*/

</script>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>


<?php
//TRAITEMENT FORMULAIRE INSCR FREELANCE AVEC AFFICHAGE ERREURS OU AFFICHAGE INSCR OK
include_once('includes/add_mbr_free.php'); 
?>
</html>