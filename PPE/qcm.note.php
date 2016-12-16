<?php
include_once('includes/co_bdd.php');
session_start();

?>

<?php
      //REDIRIGE SI UTILISATEUR NON CONNECTE
      if (empty($_SESSION['mail_sess'])) {
        header("location: index.php");
      }
      $test = intval($_POST['thenote']);
      $req3= "UPDATE mbr_free SET test=:test WHERE mail = :mail";

        $stmt = $bdd->prepare($req3);
        $stmt->bindValue(":test", $test, PDO::PARAM_INT);
        $stmt->bindValue(":mail", $_SESSION['mail_sess'], PDO::PARAM_STR);
        $stmt->execute();
        header("location: profil.php");
?>
