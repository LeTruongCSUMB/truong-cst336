<?php
$passwords = array("Retype Password");
if  (in_array($_GET['password'], $passwords)) {
  echo "Correct";
} else {
  echo "Incorrect";
}
?>