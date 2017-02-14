<?php

session_start();
require_once 'connect.php';

$_SESSION['znajomosc'] = '[{znajomosc: nic}]';

$name = $_POST['ziomek'];


$sql = "Select * FROM uzytkownik WHERE user = '$name' OR  email = '$name'";


if ($rezultat = @$polaczenie->query($sql)) {
    $ilu_userow = $rezultat->num_rows;
    if ($ilu_userow > 0) {
        $wiersz = $rezultat->fetch_assoc();
        $idZnajomego = $wiersz['id'];

        $sql3 = "Select * FROM `znajomy` WHERE my_id = '" . $_SESSION['id'] . "' and znajomy_id ='$idZnajomego'";

        if ($rezultat3 = @$polaczenie->query($sql3)) {
            $czyZnajomy = $rezultat3->num_rows;
            if ($czyZnajomy > 0) {
                header('Location: znajomi.php');
            } else
                $sql2 = "INSERT INTO `znajomy` (`my_id`, `znajomy_id`) VALUES ('" . $_SESSION['id'] . "', '$idZnajomego')";
            if ($rezultat2 = @$polaczenie->query($sql2)) {
                header('Location: znajomi.php');
            }
        }
    } else
        $_SESSION['blad'] = '<span style = " color: red">User nie istnieje</span>';
    header('Location: znajomi.php');
    //header('Location: znajomoscJSON.php');
}

$polaczenie->close();
?>
