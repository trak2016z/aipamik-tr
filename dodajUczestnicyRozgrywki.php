<?php

// pobieramy grę

session_start();
header('Content Type: application/json; charset=UTF-8');



//require_once 'polaczenia\connect.php';
require_once 'connect.php';
$query = 'SELECT rozgrywka.id, rozgrywka.data FROM `rozgrywka` WHERE host = "'.$_SESSION['id'].'" ORDER BY data DESC LIMIT 1';
 
$polaczenie->query("SET NAMES 'utf8'");
$query=$polaczenie->query($query);

while($row=$query->fetch_assoc())
{
   $dataGry = $row['id'];
}

foreach ($_POST["uczestnik"] as $key => $value)
{
    $_POST[$key] = $value;
}


foreach ($_POST["uczestnik"] as $key => $value) 
{  
  $query = "";
  $query = 'INSERT INTO `uczestnicy` (`uzytkownik_id`, `rozgrywka_id`, `bilans`) VALUES ('.$key.', '.$dataGry.', '.$value.') ON DUPLICATE KEY UPDATE `bilans`='.$value.'';
  $polaczenie->query("SET NAMES 'utf8'");
  $polaczenie->query($query);
}

echo $query;

$polaczenie->close();

header('Location: historia.php');



?>


