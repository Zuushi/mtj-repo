<?php 

session_start();

session_destroy();

header('Location: \PPE\recherche.php');