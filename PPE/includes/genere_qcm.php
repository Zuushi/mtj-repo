<?php
include_once('includes/co_bdd.php');

$id = $_SESSION['id'];
$compteur = 1;
$nb = array(1,2,3,4,5,6,7,8,9,10);
$nb2 = array();
$brn = 0;

for ($j = 0 ; $j < 6 ; $j ++)
{
    $id = ($id + $nb[$j])%10;
    if ($id == 0)
    {
        $id = 1;
    }
    if ($j >= 1)
    {
        for ($i = 0 ; $i < sizeof($nb2) ; $i ++)
            if ($i != $j)
            {
                if ($id == $nb2[$i])
                    $id = $id + 1;
            }
    }
    array_push($nb2,$id);

    $req = $bdd->query('SELECT * FROM qcm WHERE id_question='.$id);
    while ($donnees = $req->fetch())
	{

		$numbers = range(1, 4);
		shuffle($numbers);

		echo '<h3>Question '.$compteur.':</h3>
				<h5>'.$donnees['question'].'</h5>
				<ul>';
                if (intval($numbers[0]) == 1) {
                    echo '<li><input onclick="note()" type="checkbox" id="'.$brn.'"> '.$donnees[$numbers[0]].'</li>';
                } else {
                    echo '<li><input onclick="note()" type="checkbox"> '.$donnees[$numbers[0]].'</li>';
                } 
                if (intval($numbers[1]) == 1) {
                    echo '<li><input onclick="note()" type="checkbox" id="'.$brn.'"> '.$donnees[$numbers[1]].'</li>';
                } else {
                    echo '<li><input onclick="note()" type="checkbox"> '.$donnees[$numbers[1]].'</li>';
                }                
                if (intval($numbers[2]) == 1) {
                    echo '<li><input onclick="note()" type="checkbox" id="'.$brn.'"> '.$donnees[$numbers[2]].'</li>';
                } else {
                    echo '<li><input onclick="note()" type="checkbox"> '.$donnees[$numbers[2]].'</li>';
                }                
                if (intval($numbers[3]) == 1) {
                    echo '<li><input onclick="note()" type="checkbox" id="'.$brn.'"> '.$donnees[$numbers[3]].'</li>';
                } else {
                    echo '<li><input onclick="note()" type="checkbox"> '.$donnees[$numbers[3]].'</li>';
                }
				echo '</ul>';
		$compteur = $compteur + 1;    
        $brn = $brn + 1;
	}
}


?>