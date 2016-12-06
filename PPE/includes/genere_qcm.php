<?php
include_once('includes/co_bdd.php');

$id = $_SESSION['id_free'];
$compteur = 1;
$nb = array(1,2,3,4,5,6,7,8,9,10);
$nb2 = array();

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

		echo '<form>
				<h3>Question '.$compteur.':</h3>
				<h5>'.$donnees[question].'</h5>
				<ul>
					<li><input type="checkbox"> '.$donnees[$numbers[0]].'</li>
					<li><input type="checkbox"> '.$donnees[$numbers[1]].'</li>
					<li><input type="checkbox"> '.$donnees[$numbers[2]].'</li>
					<li><input type="checkbox"> '.$donnees[$numbers[3]].'</li>
				</ul>
			  </form>';
		$compteur = $compteur + 1;      
	}
}


?>