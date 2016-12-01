<?php include_once('co_bdd.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>


</head>

<div class="container">

  <h4>Filtrer les annonces :</h4>

  <a href="view_annonces.php">Toutes les annonces</a>

  <form class="form-horizontal" method="post" action="">
    <div class="row">
      <div class="col-md-4">

        <label class="radio-inline">
          <input id="radio_dev" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="dev"> Developpement web
        </label>

        <div id="div_dev" style="visibility: hidden;">
          <select name="spe1" style="width: 200px;" class="form-control">
            <option value="langages">Toutes les offres</option>
            <option value="php">Php</option>
            <option value="css">Html/Css</option>
            <option value="js">Javascript/Jquery/Ajax</option>       
          </select>
        </div>

      </div>
      <div class="col-md-4">

        <label class="radio-inline">
          <input id="radio_prog" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="prog"> Programmation logicielle
        </label>

        <div id="div_prog" style="visibility: hidden;">
          <select name="spe2" style="width: 200px;" class="form-control">
           <option value="langages">Toutes les offres</option>
            <option value="c">C</option>
            <option value="c++">C++</option>
            <option value="java">Java</option>       
          </select>
        </div>

      </div>
      <div class="col-md-4">

        <label class="radio-inline">
          <input id="radio_reseau" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="reseau"> Réseau
        </label>

        <div id="div_reseau" style="visibility: hidden;">
          <select name="spe3" style="width: 200px;" class="form-control">
           <option value="specialites">Toutes les offres</option>
            <option value="cisco">Certifié Cisco systeme</option>
            <option value="cisco">Certifié Cisco systeme</option>
            <option value="cisco">Certifié Cisco systeme</option>       
          </select>
        </div>

      </div>

      <div class="form-group">
        <br />
      </div>

      <center> <button type="submit" class="btn btn-default">Rechercher</button></center>


    </div>

  </form>



  <h3>Annonces :</h3>

  <?php

//AFFICHAGE PAR DEFAUT DE TOUTES LES ANNONCES
  if (empty($_POST)) {

    $reponse = $bdd->query('SELECT titre, date_publi, date_debut, duree, salaire, description, lieu, competences FROM annonces ORDER BY date_publi DESC');

    while ($donnees = $reponse->fetch())
    {
     echo '<ul>
     <li><b>Titre :</b> ' .$donnees['titre']. '</li>
     <li><b>Date de publication :</b> ' .$donnees['date_publi']. '</li>
     <li><b>Date de début :</b> ' .$donnees['date_debut']. '</li>
     <li><b>Budget :</b> ' .$donnees['salaire']. '€</li>
     <li><b>Description :</b> ' .$donnees['description']. '</li>
     <li><b>Lieu :</b> ' .$donnees['lieu']. '</li>
     <li><b>Compétences requises :</b> ' .$donnees['competences']. '</li>
   </ul>';
 }

}


if (!empty($_POST)) {

//AFFICHAGE EN FONCTION DE LA CATEGORIE
  if ($_POST['spe1'] == 'langages' AND $_POST['spe2'] == 'langages' AND $_POST['spe3'] == 'specialites' OR empty($_POST['spe1']) AND empty($_POST['spe2']) AND empty($_POST['spe3'])) {

    $req = $bdd->prepare('SELECT titre, date_publi, date_debut, duree, salaire, description, lieu, competences FROM annonces WHERE cat = :cat ORDER BY date_publi DESC');
    $req->execute(array(
      'cat' => $_POST['inlineRadioOptions']
      ));

    while ($donnees = $req->fetch())
    {
     echo '<ul>
     <li><b>Titre :</b> ' .$donnees['titre']. '</li>
     <li><b>Date de publication :</b> ' .$donnees['date_publi']. '</li>
     <li><b>Date de début :</b> ' .$donnees['date_debut']. '</li>
     <li><b>Budget :</b> ' .$donnees['salaire']. '€</li>
     <li><b>Description :</b> ' .$donnees['description']. '</li>
     <li><b>Lieu :</b> ' .$donnees['lieu']. '</li>
     <li><b>Compétences requises :</b> ' .$donnees['competences']. '</li>
   </ul>';
 }

}

//AFFICHAGE EN FONCTION DE LA SPECIALITE
if ($_POST['spe1'] != 'langages' AND $_POST['spe2'] != 'langages' AND $_POST['spe3'] != 'specialites' AND !empty($_POST['spe1']) OR !empty($_POST['spe2']) OR !empty($_POST['spe3'])) 
{
$req = $bdd->prepare('SELECT titre, date_publi, date_debut, duree, salaire, description, lieu, competences FROM annonces WHERE spe = :spe OR spe = :spe2 OR spe = :spe3 ORDER BY date_publi DESC');
$req->execute(array(
  'spe' => $_POST['spe1'],
  'spe2' => $_POST['spe2'],
  'spe3' => $_POST['spe3']
  ));

while ($donnees = $req->fetch())
{
 echo '<ul>
 <li><b>Titre :</b> ' .$donnees['titre']. '</li>
 <li><b>Date de publication :</b> ' .$donnees['date_publi']. '</li>
 <li><b>Date de début :</b> ' .$donnees['date_debut']. '</li>
 <li><b>Budget :</b> ' .$donnees['salaire']. '€</li>
 <li><b>Description :</b> ' .$donnees['description']. '</li>
 <li><b>Lieu :</b> ' .$donnees['lieu']. '</li>
 <li><b>Compétences requises :</b> ' .$donnees['competences']. '</li>
</ul>';
}
}

}

?>

</div>

<script>

  $( "#radio_dev" ).on( "click", function() {
    $( "#div_dev" ).css({opacity: 0.0, visibility: "visible"}).animate({opacity: 1}, 800);
    $( "#div_prog" ).css({opacity: 0.0, visibility: "hidden"}).animate({opacity: 1}, 800);
    $( "#div_reseau" ).css({opacity: 0.0, visibility: "hidden"}).animate({opacity: 1}, 800);
  });

  $( "#radio_prog" ).on( "click", function() {
    $( "#div_prog" ).css({opacity: 0.0, visibility: "visible"}).animate({opacity: 1}, 800);
    $( "#div_dev" ).css({opacity: 0.0, visibility: "hidden"}).animate({opacity: 1}, 800);
    $( "#div_reseau" ).css({opacity: 0.0, visibility: "hidden"}).animate({opacity: 1}, 800);
  });

  $( "#radio_reseau" ).on( "click", function() {
    $( "#div_reseau" ).css({opacity: 0.0, visibility: "visible"}).animate({opacity: 1}, 800);
    $( "#div_prog" ).css({opacity: 0.0, visibility: "hidden"}).animate({opacity: 1}, 800);
    $( "#div_dev" ).css({opacity: 0.0, visibility: "hidden"}).animate({opacity: 1}, 800);
  });


</script>