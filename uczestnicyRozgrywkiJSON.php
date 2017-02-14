<?php

session_start();
header('Content Type: application/json; charset=UTF-8');

echo  $_SESSION['uczestnicyRoz'];

