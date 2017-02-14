<?php

// pobieramy nową rozrywkę oraz dodajemy hosta do rozgrywki

session_start();
header('Content Type: application/json; charset=UTF-8');

require_once 'connect.php';
$query = 'SELECT rozgrywka.id, rozgrywka.data FROM `rozgrywka` WHERE host = "'.$_SESSION['id'].'" ORDER BY data DESC LIMIT 1';
 
$polaczenie->query("SET NAMES 'utf8'");
$query=$polaczenie->query($query);
$linia='[';

while($row=$query->fetch_assoc())
{
   $linia .='{"id": "'.$row['id'].'", "data":"'.$row['data'].'"},';
   $dataGry = $row['id'];
}


$linia = substr($linia, 0, strlen($linia)-1);
$linia.=']';

if($linia != ']')
{
    echo $linia;
}

else
{
    echo 'brak znajomych';
}

$query="";

$query = 'INSERT INTO `uczestnicy` (`uzytkownik_id`, `rozgrywka_id`, `bilans`) VALUES ("'.$_SESSION['id'].'", "'.$dataGry.'", "0")';

$polaczenie->query("SET NAMES 'utf8'");
$query=$polaczenie->query($query);


$polaczenie->close();

?>