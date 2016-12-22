<!-- USER  CONNECTE -->
<!-- USER  CONNECTE -->
<!-- USER  CONNECTE -->
<!-- USER  CONNECTE -->
<!-- USER  CONNECTE -->
<!-- USER  CONNECTE -->
<?php
if ($_SESSION['type'] == 'freelance') {
?>
<nav class="navbar navbar-inverse">
      <div class="container2">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span  style="font-weight: bold">Menu</span>
          </button>
          <div id="div-logo">
          <a href="index.php"><img class="image-resp" src="img/FS5.png" id="logo"></a>   
            <a class="lien-nav" href="index.php"><B>FREELANCE-SPHERE.COM</B></a>
          </div>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        <center>
          <form class="navbar-form navbar-right" action="recherche.php" method="post">
            <div class="form-group" id="form-index">
              <input type="search" class="input-xl form-control bar-form" name="recherche" id="bar-index" placeholder="Mots-clés..."><button type="submit" class="btn btn-primary" id="btn-search"><span class="glyphicon glyphicon-search"></span> Chercher</button> 
            </div>
            <div class="form-group">
              <div class="lien-nav2"><a href="view_annonces.php"><B>CONTRAT &nbsp;DE&nbsp; MISSION</B></a></div>
              <div class="lien-nav2"><a href="vos.missions.freelance.php"><B>MES MISSIONS</B></a></div>
              <div class="lien-nav2"><a href="#guide"><B>HISTORIQUE MISSIONS</B></a></div>
            </div>

            <div class="btn-nav-index">
              <button type="button" class="btn btn-primary" id="btn-deconnexion" onclick="deco()">Déconnexion</button>
                <div class="dropdown">
                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Profil
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li><center class="blue">&nbsp;<?php echo 'Bonjour '.$_SESSION['prenom'].'!'; ?>&nbsp;</center></li>
                    <li><hr></li>
                    <li><a href="profil.php"><span class="blue">Mon Profil</span></a></li>
                    <li><a href="discussions.php"><span class="blue">Mes Relations</span></a></li>
                  </ul>
                </div>
            </div>
          </form>
          </center>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
<?php
} else {
?>
<nav class="navbar navbar-inverse">
      <div class="container2">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span  style="font-weight: bold">Menu</span>
          </button>
          <div id="div-logo">
          <a href="index.php"><img class="image-resp" src="img/FS5.png" id="logo"></a>   
            <a class="lien-nav" href="index.php"><B>FREELANCE-SPHERE.COM</B></a>
          </div>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        <center>
          <form class="navbar-form navbar-right" action="recherche.php" method="post">
            <div class="form-group" id="form-index">
              <input type="search" class="input-xl form-control bar-form" name="recherche" id="bar-index" placeholder="Mots-clés..."><button type="submit" class="btn btn-primary" id="btn-search"><span class="glyphicon glyphicon-search"></span> Chercher</button> 
            </div>
            <div class="form-group">
              <div class="lien-nav2"><a href="view_annonces_free.php"><B>ENGAGER UN FREELANCE</B></a></div>
              <div class="lien-nav2"><a href="add_annonces.php"><B>AJOUTER UNE MISSION</B></a></div>
              <div class="lien-nav2"><a href="vos.missions.php"><B>MES MISSIONS</B></a></div>
            </div>

            <div class="btn-nav-index">
              <button type="button" class="btn btn-primary" id="btn-deconnexion" onclick="deco()">Déconnexion</button>
                <div class="dropdown">
                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Profil
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li><center class="blue">&nbsp;<?php echo 'Bonjour '.$_SESSION['prenom'].'!'; ?>&nbsp;</center></li>
                    <li><hr></li>
                    <li><a href="profil.php"><span class="blue">Mon Profil</span></a></li>
                    <li><a href="discussions.php"><span class="blue">Mes Relations</span></a></li>
                  </ul>
                </div>
            </div>
          </form>
          </center>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
<?php
}
?>