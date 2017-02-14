<?php
session_start();
require_once 'header.php';
?>


<body style="background-color:#3D72A4;">

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2"> <!-- style="background-color:lavender;"> -->
                <?php
                include 'leweMenu.php';
                ?>
            </div>

            <div class="col-sm-8"> <!-- style="background-color:lavenderblush;"> -->  

                <p><strong>Znajomi</strong></p>

                <div id="znajomek">
                    <ul id="wyliczanka">
                    </ul>
                </div> 
                <div>
                    <form id="dodajZiomka" method="post" action="dodajZnajomegoConnect.php">
                        <label> <strong>Dodaj znajomego: </strong> </label>
                        <input name="ziomek" />
                        <input type="submit" value="Dodaj" class="inputButton" onclick="sprawdzZnajomosc()"/>
                    </form>
                </div>
            </div>

            <script>
                jQuery.getJSON('znajomiConnect.php', function (data)
                {
                    $.each(data, function (key, val)
                    {
                        $("#znajomek").find('#wyliczanka').append('<li><span style="display" class="userID">' + val.user + ' [' + val.email + ']</li>');
                    });
                });
            </script>

        </div>
    </div>

</body>
