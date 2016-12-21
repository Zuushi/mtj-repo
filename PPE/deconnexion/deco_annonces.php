<?php 

session_start();

session_destroy();

header('Location: \PPE\view_annonces.php');