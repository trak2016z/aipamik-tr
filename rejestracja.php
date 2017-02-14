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

    <div class="container">
        <div class="col-md-12">
            <div id="logbox">
                <form id="signup" method="post" action="rejestracjaConnect.php">
                    <h1>stwórz konto</h1>
                    <input name="name" type="text" placeholder="Wybierz nick" pattern="^[\w]{3,16}$" autofocus="autofocus" required="required" class="input pass"/>
                    <input name="password" type="password" placeholder="Stwórz hasło" required="required" class="input pass"/>
                    <input name="password2" type="password" placeholder="Powtórz hasło" required="required" class="input pass"/>
                    <input name="email" type="email" placeholder="Email" required="required" class="input pass"/>
                    <input type="submit" value="Zarejestruj!" class="inputButton"/>
                    <div class="text-center">
                        masz już konto? <a href="login.php" id="login_id">zaloguj</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
