<?php

session_start();
header('Content Type: application/json; charset=UTF-8');

require_once 'connect.php';
$query = 'SELECT uzytkownik.id, uzytkownik.user, uzytkownik.email FROM uzytkownik INNER JOIN znajomy ON uzytkownik.id=znajomy.znajomy_id where znajomy.my_id = "'.$_SESSION['id'].'"';
$polaczenie->query("SET NAMES 'utf8'");
$query=$polaczenie->query($query);
$linia='[';

while($row=$query->fetch_assoc())
{
   $linia .='{"id": "'.$row['id'].'", "user":"'.$row['user']. '","email":"'.$row['email'].'"},';           
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
?>

