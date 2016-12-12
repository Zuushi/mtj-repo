<?php 

session_start();

session_destroy();

header('Location: view_annonces.php');