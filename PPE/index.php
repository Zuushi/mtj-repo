<?php
include_once('includes/co_bdd.php');
include_once('includes/traitement_co.php');
?>

<!DOCTYPE html>
<html lang="en">

<?php 
  include_once('includes/header.php'); 
?>
    <body>

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
            include_once('navbar/navbar_user_connecte.php'); 
            if(isset($_SESSION['accueil'])) {
            ?>
            <center><div class="alert alert-info" role="alert">Bienvenue sur notre site <?php echo $_SESSION['accueil']?> !</div></center>
         <?php } } 
         else {
         //BARRE MENU UTILISATEUR NON CONNECTE
            include_once('navbar/navbar_user_non_connecte.php');
         }
         //FORMULAIRE DE CONNEXION QUI S'AFFICHE LORS DE LA CONNEXION
         include_once('includes/formulaire_connexion.php');

      ?>

      <div class="full_slide">
        <header id="myCarousel" class="carousel slide">
          <!-- Wrapper for Slides -->
          <div class="carousel-inner">
            <div class="item active" id="item1">
              <!-- Set the first background image using inline CSS below. -->
              <div class="fill image-resp" style="background-image:url('img/bandeau1.jpg');color:white"><center><span id="slogan-1-1">DES PARTENAIRES<br><br></span><span id="slogan-1-2"> À TRAVERS LE MONDE</span></center></div>
            </div>
            <div class="item" id="item2">
              <!-- Set the second background image using inline CSS below. -->
              <div class="fill image-resp" style="background-image:url('img/bandeau2.png');color:white"><center><span id="slogan-2-1">DES PROFESSIONNELS<br></span><span id="slogan-2-2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;À l'ÉCOUTE <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DE VOS BESOINS</span></center></div>
            </div>       
            <div class="item" id="item3">
              <div class="fill image-resp" style="background-image:url('img/bandeau5.jpg');color:white"><center><span id="slogan-3-1">&nbsp;DES MISSIONS <br>ADAPTÉES<br></span><span id="slogan-3-2">À VOS COMPÉTENCES</span></center></div>
            </div>
          </div>

<!--            Controls 
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
          </a> -->

        </header>
      </div>

      <div>
        <!-- Example row of columns -->
	<div class="mid-principal">
		<center>
		    <div class="container">
		    </div>
		    <div>
		    <span><h2 id="guide">Les étapes pour un départ réussi: 
		    <button class="btn-choix" id="btn-1" onclick="changeInfos2(0)">JE SUIS UN FREELANCE</button><button id="btn-2" onclick="changeInfos(0)" class="btn-choix">JE SUIS UNE SOCIETE</button></h2></span>
		    </div><br>
		</center>
	</div>
  <div style="height: 10px;"></div>
  <div id="infos" class="resp-etapes">
      <span class="resp-numbers2">
        <img class="nombre2" src="img/1.png">
        <span class="resp-span">
        <center>
        <B>Créez un compte</B><br><br>
        </center>
          <ul>
            <li>Renseignez votre profil</li>
            <li>Passez l'épreuve d'admission</li>
            <li>Définissez vos compétences</li>
          </ul>
        </span>
      </span>         
      <span class="resp-numbers">
        <img class="nombre2" src="img/2.png">
        <span class="resp-span">
        <center>
        <B>Déposez votre CV</B><br><br>
        </center>
          <ul>
            <li>Renseignez vos expériences</li>
            <li>Déposez vos diplômes</li>
            <li>Présentez vos projets</li>
          </ul>
        </span>
      </span>         
      <span class="resp-numbers">
        <img class="nombre" src="img/3.png">
        <span class="resp-span">
        <center>
        <B>Postulez aux missions qui vous correspondent</B><br><br>
        </center>
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
        <img class="nombre2" src="img/1.png">
        <span class="resp-span">
        <center>
        <B>Créez un compte entreprise</B><br><br>
        </center>
          <ul>
            <li>Renseignez les informations<br> de la société</li>
            <li>Définissez vos attentes</li>
          </ul>
        </span>
      </span>         
      <span class="resp-numbers">
        <img class="nombre2" src="img/2.png">
        <span class="resp-span">
        <center>
        <B>Déposez votre mission</B><br><br>
        </center>
          <ul>
            <li>Spécifiez les compétences<br> requises</li>
            <li>Précisez les axes de mission</li>
            <li>Présentez le projet</li>
          </ul>
        </span>
      </span>         
      <span class="resp-numbers">
        <img class="nombre" src="img/3.png">
        <span class="resp-span">
        <center>
        <B>Trouvez les professionnels dont vous avez besoin</B><br><br>
        </center>
          <ul>
            <li>Des profils compétents dans tout les secteurs</li>
            <li>Divers critères de selection</li>
            <li>Envoyez vos offres de mission par mail</li>
            <li>Concluez le contrat</li>
          </ul>
        </span>
      </span>   
  </div>

<div>
  <center>
    <h3 style="background-color: #337ab7;color: white;">Les dernières missions déposées :</h3>
  </center>
  <div>
  <?php 
  $c = 0;
      $reponse = $bdd->query('SELECT id_ann, id_soci, titre, nom_soci, date_publi, date_debut, duree, salaire, description, lieu, competences FROM annonces ORDER BY id_ann DESC');
    while ($donnees = $reponse->fetch() AND $c < 3)
    {
      if ($c == 0) {
        echo '<div class="last-annonces1" style="min-height:230px"><ul class="annonces-focus" onclick="traitement('.$c.')">
                   <li><b>Titre :</b> ' .$donnees['titre']. '</li>
                   <li><b>Entreprise :</b> ' .$donnees['nom_soci']. '</li>
                   <li><b>Date de publication :</b> ' .$donnees['date_publi']. '</li>
                   <li><b>Date de début :</b> ' .$donnees['date_debut']. '</li>
                   <li><b>Budget :</b> ' .$donnees['salaire']. '€</li>
                   <li><b>Description :</b> ' .$donnees['description']. '</li>
                   <li><b>Lieu :</b> ' .$donnees['lieu']. '</li>
                   <li><b>Compétences requises :</b> ' .$donnees['competences']. '</li>
                   <form name="mission" id="mission'.$c.'" action="mission.php?='.$donnees['titre'].'" method="post">
                   <input name="titre" value="'.$donnees['titre'].'" type="hidden">
                   <input name="duree" value="'.$donnees['duree'].'" type="hidden">
                   <input name="id" value="'.$donnees['id_soci'].'" type="hidden">
                   <input name="id_annonce" value="'.$donnees['id_ann'].'" type="hidden">
                   <input name="entreprise" value="'.$donnees['nom_soci'].'" type="hidden">
                   <input name="date_publication" value="'.$donnees['date_publi'].'" type="hidden">
                   <input name="date_debut" value="'.$donnees['date_debut'].'" type="hidden">
                   <input name="salaire" value="'.$donnees['salaire'].'" type="hidden">
                   <input name="description" value="'.$donnees['description'].'" type="hidden">
                   <input name="lieu" value="'.$donnees['lieu'].'" type="hidden">
                   <input name="competences" value="'.$donnees['competences'].'" type="hidden"> 
                   </form>                   
                 </ul></div>';
      }
      else
      {
        echo '<div class="last-annonces" style="min-height:230px"><ul class="annonces-focus" onclick="traitement('.$c.')">
                   <li><b>Titre :</b> ' .$donnees['titre']. '</li>
                   <li><b>Entreprise :</b> ' .$donnees['nom_soci']. '</li>
                   <li><b>Date de publication :</b> ' .$donnees['date_publi']. '</li>
                   <li><b>Date de début :</b> ' .$donnees['date_debut']. '</li>
                   <li><b>Budget :</b> ' .$donnees['salaire']. '€</li>
                   <li><b>Description :</b> ' .$donnees['description']. '</li>
                   <li><b>Lieu :</b> ' .$donnees['lieu']. '</li>
                   <li><b>Compétences requises :</b> ' .$donnees['competences']. '</li>
                   <form name="mission" id="mission'.$c.'" action="mission.php?='.$donnees['titre'].'" method="post">
                   <input name="titre" value="'.$donnees['titre'].'" type="hidden">
                   <input name="duree" value="'.$donnees['duree'].'" type="hidden">
                   <input name="id" value="'.$donnees['id_soci'].'" type="hidden">
                   <input name="id_annonce" value="'.$donnees['id_ann'].'" type="hidden">
                   <input name="entreprise" value="'.$donnees['nom_soci'].'" type="hidden">
                   <input name="date_publication" value="'.$donnees['date_publi'].'" type="hidden">
                   <input name="date_debut" value="'.$donnees['date_debut'].'" type="hidden">
                   <input name="salaire" value="'.$donnees['salaire'].'" type="hidden">
                   <input name="description" value="'.$donnees['description'].'" type="hidden">
                   <input name="lieu" value="'.$donnees['lieu'].'" type="hidden">
                   <input name="competences" value="'.$donnees['competences'].'" type="hidden"> 
                   </form>                   
                 </ul></div>';
      }
      $c = $c + 1;

    }

  ?>
  </div>  
  <div>
    
  </div>
</div>

<div>
  <center>
    <h3 style="background-color: #337ab7;color: white;">Les Freelancers récemment inscrits :</h3>
  </center>
  <div>
  <?php 
  $d = 0;
      $reponse = $bdd->query('SELECT id_free, nom, photo, prenom, mail, date_inscr, test, competences, site_web, tarif, langues, localisation FROM mbr_free ORDER BY id_free DESC');
    while ($donnees = $reponse->fetch() AND $d < 3)
    {
      if ($d == 0) {
     echo '<div class="last-annonces1" style="min-height:230px"><ul class="annonces-focus" onclick="traitementFreelance('.$d.')">';
     if ($donnees['photo'] != "") {
       echo '<img class="img-responsive" style="margin-right:2px;width: 30%;height: 30%;max-width: 170px;max-height: 150px;float: right; border-radius: 5px; border: 1px solid #337ab7;" id="photo" src="'.$donnees['photo'].'">';
     } else {
       echo '<img class="img-responsive" style="margin-right:2px;width: 30%;height: 30%;max-width: 170px;max-height: 150px;float: right; border-radius: 5px; border: 1px solid #337ab7;" id="photo" src="img/default.jpg">';
     }
     echo'<li><b>Nom :</b> ' .$donnees['nom']. '</li>
     <li><b>Prénom :</b> ' .$donnees['prenom']. '</li>
     <li><b>Email :</b> ' .$donnees['mail']. '</li>
     <li><b>Date d\'inscription :</b> ' .$donnees['date_inscr']. '</li>
     <li><b>Compétences :</b> ' .$donnees['competences']. '</li>
     <li><b>Site Web :</b> ' .$donnees['site_web']. '</li>
     <li><b>Tarif :</b> ' .$donnees['tarif']. '€</li>
     <li><b>Langues parlées :</b> ' .$donnees['langues']. '</li>
     <li><b>Localisation :</b> ' .$donnees['localisation']. '</li>
     <form name="profil.freelance" id="profil.freelance'.$d.'" action="profil.freelance.php?='.$donnees['competences'].'" method="post">
     <input name="titre" value="'.$donnees['nom'].'" type="hidden">
     <input name="id" value="'.$donnees['id_free'].'" type="hidden">
     <input name="nom" value="'.$donnees['nom'].'" type="hidden">
     <input name="prenom" value="'.$donnees['prenom'].'" type="hidden">
     <input name="mail" value="'.$donnees['mail'].'" type="hidden">
     <input name="date_inscr" value="'.$donnees['date_inscr'].'" type="hidden">
     <input name="competences" value="'.$donnees['competences'].'" type="hidden">
     <input name="site_web" value="'.$donnees['site_web'].'" type="hidden">
     <input name="tarif" value="'.$donnees['tarif'].'" type="hidden">
     <input name="langues" value="'.$donnees['langues'].'" type="hidden"> 
     <input name="localisation" value="'.$donnees['localisation'].'" type="hidden"> 
     </form>                   
   </ul></div>';
      }
      else
      {
     echo '<div class="last-annonces" style="min-height:230px" ><ul class="annonces-focus" onclick="traitementFreelance('.$d.')">';
     if ($donnees['photo'] != "") {
       echo '<img class="img-responsive" style="margin-right:2px;width: 30%;height: 30%;max-width: 170px;max-height: 150px;float: right; border-radius: 5px; border: 1px solid #337ab7;" id="photo" src="'.$donnees['photo'].'">';
     } else {
       echo '<img class="img-responsive" style="margin-right:2px;width: 30%;height: 30%;max-width: 170px;max-height: 150px;float: right; border-radius: 5px; border: 1px solid #337ab7;" id="photo" src="img/default.jpg">';
     }
     echo'<li><b>Nom :</b> ' .$donnees['nom']. '</li>
     <li><b>Prénom :</b> ' .$donnees['prenom']. '</li>
     <li><b>Email :</b> ' .$donnees['mail']. '</li>
     <li><b>Date d\'inscription :</b> ' .$donnees['date_inscr']. '</li>
     <li><b>Compétences :</b> ' .$donnees['competences']. '</li>
     <li><b>Site Web :</b> ' .$donnees['site_web']. '</li>
     <li><b>Tarif :</b> ' .$donnees['tarif']. '€</li>
     <li><b>Langues parlées :</b> ' .$donnees['langues']. '</li>
     <li><b>Localisation :</b> ' .$donnees['localisation']. '</li>
     <form name="profil.freelance" id="profil.freelance'.$d.'" action="profil.freelance.php?='.$donnees['competences'].'" method="post">
     <input name="titre" value="'.$donnees['nom'].'" type="hidden">
     <input name="id" value="'.$donnees['id_free'].'" type="hidden">
     <input name="nom" value="'.$donnees['nom'].'" type="hidden">
     <input name="prenom" value="'.$donnees['prenom'].'" type="hidden">
     <input name="mail" value="'.$donnees['mail'].'" type="hidden">
     <input name="date_inscr" value="'.$donnees['date_inscr'].'" type="hidden">
     <input name="competences" value="'.$donnees['competences'].'" type="hidden">
     <input name="site_web" value="'.$donnees['site_web'].'" type="hidden">
     <input name="tarif" value="'.$donnees['tarif'].'" type="hidden">
     <input name="langues" value="'.$donnees['langues'].'" type="hidden"> 
     <input name="localisation" value="'.$donnees['localisation'].'" type="hidden"> 
     </form>                   
   </ul></div>';
      }
      $d = $d + 1;

    }

  ?>
  <br><br>
  </div>  
  <div>
    
  </div>
</div>

<div class="mid-principal">
    <div class="container">
		<div class="clear"></div>
    </div>

    <div>
    <br>
	    <center><span class="phrase-plateforme" id="les-part">Nos partenaires : &nbsp;
	    	<img class="part" src="img/logo_part/air-logo.png">&nbsp;&nbsp;
	    	<img class="part2" src="img/logo_part/logo-etat.png">&nbsp;&nbsp;
	    	<img class="part2" src="img/logo_part/sophia-logo1.png">&nbsp;&nbsp;
	    	<img class="part2" src="img/logo_part/eurocop.png">&nbsp;&nbsp;
	    </span></center>
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
                <a href="https://twitter.com/?lang=fr"><img class="logo-icon" src="img/Twitter.png"></a>
                <a href="https://getbootstrap.com"><img class="logo-icon" src="img/Boostrap.png"></a>
                <a href="https://www.youtube.fr"><img class="logo-icon" src="img/Youtube.png"></a>
                <a href="https://www.google.fr"><img class="logo-icon2" src="img/google.png"></a>
                <span class="phrase-plateforme">Suivez-nous sur les différentes plateformes!</span>
            </div>
        </div>
    <hr class="hrwhite">
    <div class="container">
        <div class="homemenu">
            <div class="col-md-4 col-lg-4 footerblokk">
                <div class="tittle">Services aux sociétés:</div>
                <div><a href="#">- freelance-sphere.com/exemple</a></div>

            </div>
            <div class="col-md-4 col-lg-4 footerblokk">
                <div class="tittle">Services aux freelances:</div>
                <div><a href="#">- Provigis</a></div>
                <div><a href="#">- Portage Salarial</a></div>
            </div>
            <div class="col-md-4 col-lg-4 footerblokk">
                <div class="tittle">FAQ:</div>
                <div>
                    
                    
                        
                    
                    <a href="#">- FAQ pour les sociétés</a>
                </div>
                <div>
                    
                    
                        
                    
                    <a href="#">- FAQ pour les freelances</a>
                </div>
            </div>
            <br clear="all"><br><br>
            <div class="col-md-4 col-lg-4 footerblokk">
                <div class="tittle">Contactez-nous:</div>
                
                
                    
                
                <div><a href="#">- Siège social</a></div>
                <div>
                    
                    
                        
                    
                    <a href="#">- Un problème technique</a>
                </div>
                <div><a href="#">- Travailler chez freelance-sphere.com</a></div>
            </div>
            <div class="col-md-4 col-lg-4 footerblokk">
                <div class="tittle">Investisseurs:<a href="#" class="expose"> investisseurs@freelance-sphere.com</a></div>
                <div>
                    
                    
                        
                    
                    <a href="#">- Quelques chiffres clés</a>
                </div>
                <div>
                    <a href="#">- Informations réglementées</a>
                </div>
                <div>
                    <a href="#">- Espace actionnaires</a>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 footerblokk">
                <div class="tittle">Qui sommes-nous?:</div>
                <div>
                    
                    
                        
                    
                    <a href="#">- A propos de freelance-sphere.com</a>
                </div>
                
         
                <div>
                    
                    
                        
                    
                    <a href="#">- Notre équipe de professionnels</a>
                </div>
                <div>
                    
                    
                        
                    
                    <a href="#">- Témoignages</a>
                </div>
                <div><a href="#">- Mentions légales</a></div>
            </div>
        </div>
        <br clear="all"><br><br>
    </div>
</div>
      </div>  <!--/container -->


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

      document.getElementById('btn-1').disabled = true;
      document.getElementById('btn-2').disabled = true;
    	if (SomeNumberThing <= 100) 
    	{
    		document.getElementById('infos').style.visibility = "hidden";
    		document.getElementById('infos2').style.visibility = "visible";
		    FluffyKittenMaker(SomeNumberThing);
		    SomeNumberThing += 1;
		    window.setTimeout("changeInfos("+SomeNumberThing+")", 1);
		  }
      else
      {
        document.getElementById('btn-1').disabled = false;
        document.getElementById('btn-2').disabled = false;
      }
    }    

    function FluffyKitten(SomeNumberThing)
    {
    	var infos = document.getElementById('infos');
    	infos.style.opacity = SomeNumberThing/100;
    } 

    function changeInfos2(SomeNumberThing) 
    {
      document.getElementById('btn-1').disabled = true;
      document.getElementById('btn-2').disabled = true;
    	if (SomeNumberThing <= 100) 
    	{
    		document.getElementById('infos2').style.visibility = "hidden";
    		document.getElementById('infos').style.visibility = "visible";
		    FluffyKitten(SomeNumberThing);
		    SomeNumberThing += 1;
		    window.setTimeout("changeInfos2("+SomeNumberThing+")", 1);
		  }
      else
      {
        document.getElementById('btn-1').disabled = false;
        document.getElementById('btn-2').disabled = false;
      }
    }

      function Slogan11(SomeNumberThing)
    {
    	var slogan11 = document.getElementById('slogan-1-1');
    	slogan11.style.opacity = SomeNumberThing/100;
    }         

    	function Slogan12(SomeNumberThing)
    {
    	var slogan12 = document.getElementById('slogan-1-2');
    	slogan12.style.opacity = SomeNumberThing/100;
    }         

    	function Slogan21(SomeNumberThing)
    {
    	var slogan21 = document.getElementById('slogan-2-1');
    	slogan21.style.opacity = SomeNumberThing/100;
    }         

    	function Slogan22(SomeNumberThing)
    {
    	var slogan22 = document.getElementById('slogan-2-2');
    	slogan22.style.opacity = SomeNumberThing/100;
    }     	
    	function Slogan31(SomeNumberThing)
    {
    	var slogan31 = document.getElementById('slogan-3-1');
    	slogan31.style.opacity = SomeNumberThing/100;
    }         

    	function Slogan32(SomeNumberThing)
    {
    	var slogan32 = document.getElementById('slogan-3-2');
    	slogan32.style.opacity = SomeNumberThing/100;
    } 

    function FluffySlogan11(SomeNumberThing) 
    {
    	if (SomeNumberThing <= 100) 
    	{
		    Slogan11(SomeNumberThing);
		    SomeNumberThing += 0.4;
		    window.setTimeout("FluffySlogan11("+SomeNumberThing+")", 1);
		}
		if (SomeNumberThing >= 100)
		{
			FluffySlogan12(0);
		}
    }

    function FluffySlogan12(SomeNumberThing) 
    {
    	if (SomeNumberThing <= 100) 
    	{
		    Slogan12(SomeNumberThing);
		    SomeNumberThing += 0.4;
		    window.setTimeout("FluffySlogan12("+SomeNumberThing+")", 1);
		}
		if (SomeNumberThing >= 100)
		{
			var item2 = document.getElementById('item2');
			if (item2.classList.contains('active'))
			{
				FluffySlogan21(0);
			}
			else
			{
				window.setTimeout("FluffySlogan12("+SomeNumberThing+")", 100);
			}  		
		}
    }

    function FluffySlogan21(SomeNumberThing) 
    {
    	if (SomeNumberThing <= 100) 
    	{
		    Slogan21(SomeNumberThing);
		    SomeNumberThing += 0.4;
		    window.setTimeout("FluffySlogan21("+SomeNumberThing+")", 1);
		}
		if (SomeNumberThing >= 100)
		{
			FluffySlogan22(0);
		}
    }

    function FluffySlogan22(SomeNumberThing) 
    {
    	if (SomeNumberThing <= 100) 
    	{
		    Slogan22(SomeNumberThing);
		    SomeNumberThing += 0.4;
		    window.setTimeout("FluffySlogan22("+SomeNumberThing+")", 1);
		}

		if (SomeNumberThing >= 100)
		{
			var item3 = document.getElementById('item3');
			if (item3.classList.contains('active'))
			{
				FluffySlogan31(0);
			}
			else
			{
				window.setTimeout("FluffySlogan22("+SomeNumberThing+")", 100);
			}  		
		}
    }    
    	function FluffySlogan31(SomeNumberThing) 
    {
    	if (SomeNumberThing <= 100) 
    	{
		    Slogan31(SomeNumberThing);
		    SomeNumberThing += 0.4;
		    window.setTimeout("FluffySlogan31("+SomeNumberThing+")", 1);
		}
		if (SomeNumberThing >= 100)
		{
			FluffySlogan32(0);
		}
    }

    function FluffySlogan32(SomeNumberThing) 
    {
    	if (SomeNumberThing <= 100) 
    	{
		    Slogan32(SomeNumberThing);
		    SomeNumberThing += 0.4;
		    window.setTimeout("FluffySlogan32("+SomeNumberThing+")", 1);
		}

/*		if (SomeNumberThing >= 100)
		{
			var item1 = document.getElementById('item1');
			if (item1.classList.contains('active'))
			{
				FluffySlogan11(0);
			}
			else
			{
				window.setTimeout("FluffySlogan32("+SomeNumberThing+")", 100);
			}  		
		}*/
    }

    window.onload = sliderShow;

    function sliderShow ()
    {
    	FluffySlogan11(0);
    }

    function deco () 
    {
      window.location= "./deconnexion/deco.php";
    }

        function traitement (x)
    {
      document.getElementById("mission"+x).submit();
      return false;
    }        
    function traitementFreelance (x)
    {
      document.getElementById("profil.freelance"+x).submit();
      return false;
    }

    </script>

    <script>
      $('.carousel').carousel({
        interval: 8000 //changes the speed
      })

      $('a[href^="#guide"]').click(function(){  
    var id = $(this).attr("href");
    var offset = $(id).offset().top 
    $('html, body').animate({scrollTop: offset}, 'slow'); 
    return false;  
});   
    </script>
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
  </html>