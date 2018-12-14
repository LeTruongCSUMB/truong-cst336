<?php
session_start(); 
include 'functions.php';

checkLoggedIn(); 


$comicID = $_GET['id'];
deleteComicFromDB($comicID); 

header('Location: profile.php');

?>
