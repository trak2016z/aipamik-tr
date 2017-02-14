<?php

session_start();
header('Content Type: application/json; charset=UTF-8');

echo '[{"idU": "'.$_SESSION['id'].'", "userU":"'.$_SESSION['user'].'"}]';




