<!DOCTYPE html>
<html lang="pl">

    <head>
        <title>AI Pamik</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- <link href = "css.css" rel = "stylesheet" type = "text/css" /> -->
        <link href = "loginRejestracja.css" rel = "stylesheet" type = "text/css" />

        <?php
        include 'nawigacjaTop.php';
        ?>

    </head>

    <div class="col-md-12">
        <div id="logbox">
            <form id="login" method="post" action="loginConnect.php">
                <h1>logowanie</h1>
                <input name="login" type="email" placeholder="podaj email" class="input pass"/>
                <input name="haslo" type="password" placeholder="podaj hasło" required="required" class="input pass"/>
                <input type="submit" value="Zaloguj!" class="inputButton"/>
                <div class="text-center">
                    <a href="rejestracja.php" id="">stwórz konto</a> <!-- - <a href="#" id="">zapomniałem hasła</a> -->
                </div>
            </form>
        </div>
    </div>