<!DOCTYPE html>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">AI Pamik</a>
            </div>

            <ul class="nav navbar-nav navbar-right" id = "lol1">
                <?php
                if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany'] == true)) {
                    require 'logout.php';
                } else {
                    require 'navprzyciski.php';
                }
                ?>
            </ul>
        </div>
    </nav>
