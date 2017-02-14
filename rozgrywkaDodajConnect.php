<?php

session_start();
header('Content Type: application/json; charset=UTF-8');

require_once 'connect.php';

$query = 'INSERT INTO `rozgrywka` (`id`, `host`, `data`) VALUES (NULL, "'.$_SESSION['id'].'", CURRENT_TIMESTAMP)';

$polaczenie->query("SET NAMES 'utf8'");

if($rezultat = @$polaczenie->query($query))
{
    header('Location: index.php');
}

$polaczenie->close();


