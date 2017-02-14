<?php
session_start();
require_once 'header.php';
?>

<body style="background-color:#3D72A4;">

    <div class="container-fluid">
        <!-- <h1>Tramwajek</h1> -->

        <div class="row">
            <div class="col-sm-2"> <!-- style="background-color:lavender;"> -->

                <?php
                include 'leweMenu.php';
                ?>

            </div>

            <div class="col-sm-4"> <!-- style="background-color:lavenderblush;"> -->

                <div class="container-fluid">
                    <button type ="button" class ="btn btn-default" id="dodajRB">Dodaj Rozgrywkę</button> 
                    <!-- The Modal -->
                    <div id="myModal" class="modal">

                        <!-- Modal content -->
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <p style="text-align:center; font-size: 150%;"><strong>Rozgrywka dodana!</strong></p>
                        </div>

                    </div>

                </div>
                <div class="container-fluid" id="rozgrywkowy" style="display:none;">
                    <div>
                        <label style="padding-right:13px;"><strong>Liczba graczy: </strong></label>
                        <input id="liczbaGraczy" type="text" style="width: 100px;" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onblur="oblicz()"/>
                    </div>
                    <div>
                        <label style="padding-right:60px;"><strong>Wpłata:</strong> </label>
                        <input id="wplata" type="text" style="width: 100px;" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onblur="oblicz()"  />
                        <strong> Realna wpłata: </strong>
                        <div style="display: inline;">
                            <div style="display: inherit;" id="realnaWplata"> </div>
                        </div>
                    </div>

                    <label style="padding-right:12px;"><strong>Typy żetonów: </strong></label>
                    <input id="iloscTypowZetonow" type="text" style="width: 100px;" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onblur="stworzZetony(), oblicz(), dodajHostaInputs()"  />

                    <p id="pomocnik"><p>
                    <p id="dynamiczny">

                    <div id="graczeID" style="padding-top: 25px; display:none;"><strong>Gracze:</strong></div>
                    </p>

                    <form id="rozgrywkaForm" method="post" action="dodajUczestnicyRozgrywki.php">
                        <div class = "gracze">
                        </div>
                        <div  style="padding-left:53px;">
                            <input type="submit" value="Zapisz gre" class="inputButton" id="zapiszRozgrywkeButton" style="display:none;">
                        </div>
                    </form>

                    <div class="form-group" id="wybierzZnajomego" style="padding-top:30px;">
                        <input id="ileZnajomychDodanych" style="display:none;" value="1"/>
                        <div class="dropdown selectUser">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><span class="userLabel">Wybierz znajomego...</span>
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                            </ul>
                        </div>
                    </div>
                    <div class = "pomoc1" id="3">
                        <p class = "pomoc2">

                        </p>
                    </div>
                </div>


                <script>
                    <?php
                    include 'skrypty.js'
                    ?>
                </script>

            </div>
            <div class="col-sm-4"> <!-- style="background-color:lavenderblush;"> -->

            </div>
        </div>
    </div>