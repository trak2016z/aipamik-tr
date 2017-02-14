<?php

session_start();
header('Content Type: application/json; charset=UTF-8');

require_once 'connect.php';

$query = 'SELECT rozgrywka.id, uzytkownik.user, rozgrywka.data FROM rozgrywka INNER JOIN uzytkownik on rozgrywka.host = uzytkownik.id where uzytkownik.id = "'.$_SESSION['id'].'" ORDER BY rozgrywka.id DESC';

$polaczenie->query("SET NAMES 'utf8'");
$query=$polaczenie->query($query);

$ileRozgrywek = $query->num_rows;


$linia='[';

$r = 0;

while($row=$query->fetch_assoc())
{   
    $linia .='{"id": "'.$row['id'].'", "host":"'.$row['user'].'", "data":"'.$row['data'].'"},'; // host to id uzytkownika, a user to nick uzytkownika          
    $rozID[$r]= $row['id'];
    $r += 1;
}
$linia = substr($linia, 0, strlen($linia)-1); // ucinamy ostatni przecinek, żeby pasowało do jsona
$linia.=']';

if($linia != ']')
{
    echo $linia;
}

$_SESSION['uczestnicyRoz'] = '[';

for($i=0; $i<$r; $i++)
{
    $query2 = "";
    $polaczenie->query("SET NAMES 'utf8'");
    
    $query2 = 'SELECT uczestnicy.uzytkownik_id, uzytkownik.user, uczestnicy.bilans FROM uczestnicy INNER JOIN uzytkownik on uzytkownik.id = uczestnicy.uzytkownik_id WHERE rozgrywka_id = '.$rozID[$i].'';
    
    $query2=$polaczenie->query($query2);
    
    while($row2=$query2->fetch_assoc())
    {           
        $_SESSION['uczestnicyRoz'] .='{"idU": "'.$row2['uzytkownik_id'].'", "userName": "'.$row2['user'].'", "bilansU":"'.$row2['bilans'].'", "idR":"'.$rozID[$i].'"},'; //       
    }    
}

$_SESSION['uczestnicyRoz'] = substr($_SESSION['uczestnicyRoz'], 0, $_SESSION['uczestnicyRoz']-1);




$_SESSION['uczestnicyRoz'] .= ']';



$polaczenie->close();

?>



