<?php
session_start();
require_once 'header.php';
?>

<body style="background-color:#3D72A4;">

    <div class="container-fluid">
        <!-- <h1>Tramwajek</h1> -->

        <div class="row">

            <div class="col-sm-1"> <!-- style="background-color:lavender;"> -->

                <?php
                //require 'connect.php'; // polaczenie z baza danych
                //require 'historiaConnect.php';
                //global $a;
                include 'leweMenu.php';
                ?>

            </div>
            <div class="col-sm-1"  style=" min-width: 100px;"> <!-- pomaga w responsywnosci--> </div>

            <div class="col-sm-2" style="min-width: 150px;"> <!-- style="background-color:red;"> -->


                <div id="historyjka">

                    <div id="rozgrywki_k0" >
                    </div>

                </div>       
            </div>

            <div class="col-sm-1" style=" min-width: 105px;"> <!-- pomaga w responsywnosci--> </div>

            <div class="col-sm-2"> <!-- style="background-color:lavenderblush;"> -->

                <div id="historyjka2"> <!-- druga kolumna historii -->

                    <div id="rozgrywki_k1">
                        <div>

                        </div>       
                    </div>

                </div>
                <!--<div class="col-sm-4" style="background-color:lavender;">.col-sm-4</div> -->
            </div>
            <div class="col-sm-1" style="min-width: 105px;"> <!-- pomaga w responsywnosci--> </div>

            <div class="col-sm-2" style="min-width: 150px;"> <!-- style="background-color:lavenderblush;"> -->

                <div id="historyjka3"> <!-- druga kolumna historii -->

                    <div id="rozgrywki_k2">
                        <div>

                        </div>       
                    </div>

                </div>
                <!--<div class="col-sm-4" style="background-color:lavender;">.col-sm-4</div> -->
            </div>
        </div>

        <script>

            //ileRozgrywek = -1;
            jQuery.getJSON('historiaConnect.php', function (data)
            {
                $.each(data, function (key, val)
                {
                    $('#historyjka').find('#rozgrywki_k0').append('<div class="rozgrywka" id="rozgrywkaNr' + val.id + '"> <br> <button type="button" onclick="toggleUczestnikow(' + val.id + ')" class="btn btn-default"><span style="display" class="userID" id=' + val.id + '>' + val.id + ' [' + val.host + '] [' + val.data + ']</span></button></div>');
                    //ileRozgrywek = val.id;

                });

                jQuery.getJSON('uczestnicyRozgrywkiJSON.php', function (data)
                {
                    $.each(data, function (key, val)
                    {
                        $('#rozgrywki_k0').find('#rozgrywkaNr' + val.idR + '').append('<div class="uczestnicy' + val.idR + '" style="display:none; min-width: 265px;"><br>Rozgrywka: ' + val.idR + ' Gracz: ' + val.userName + ', Bilans: ' + val.bilansU + '</div>');

                    });

                    var ileRozgrywek = $("#rozgrywki_k0 > div").length; // ile rozgrywek, liczymy bezpośrednich potomkow pierwszej kolumny rozgrywek (czyli wszystkie rozgrywki)
                    if (ileRozgrywek > 10)
                    {
                        var k = 0;
                        var s = 0;
                        var przesunSkadPobieram = 0;
                        var przypiszDodatkowa = 0;
                        if (ileRozgrywek > 30)
                        {
                            var podziel = Math.floor(ileRozgrywek / 3);
                            k = 2;

                            if (ileRozgrywek % 3 == 2) // przydzielimy dodatkowa rozgrywke do drugiej kolumny
                            {
                                przypiszDodatkowa = 1;
                                przesunSkadPobieram = 1;
                            }
                            else if (ileRozgrywek % 3 == 1)
                            {
                                przesunSkadPobieram = 1;
                            }
                        }
                        else
                        {
                            var podziel = Math.floor(ileRozgrywek / 2);

                            if (ileRozgrywek % 2 == 1)
                            {
                                przesunSkadPobieram = 1;
                            }
                            k = 1;

                        }

                        var i = 0;
                        for (j = 1; j <= k; j++)
                        {
                            for (i = 0; i < podziel + przypiszDodatkowa; i++)
                            {
                                $(".rozgrywka").eq(podziel + przesunSkadPobieram).appendTo("#rozgrywki_k" + j + "");
                                //$('#historyjka2').find('#rozgrywki_k1').append('<div>'+tramwajek+'<div>');
                            }
                            przypiszDodatkowa = 0;

                        }

                    }


                });
            });

            /* POTENCJALNIE, ale zawile i w sumie po co kombinować w taki sposob?
             jQuery.getJSON('historiaConnect.php', function( data )
             {
             $.each( data, function( key, val ) 
             {    
             // $("#znajomek").find('#wyliczanka').append('<li><span style="display" class="userID">'+val.id+'</span><a href="#">'+val.user+' ['+val.email+']</a></li>'); // z linkiem i id
             $('#historyjka').find('#rozgrywki_k0').append('<button type="button" onclick="pobierzDane('+val.id+')" class="btn btn-default"><span style="display" class="userID" id='+val.id+'>'+val.id+' ['+val.host+'] ['+val.data+']</span></button><br>');
             $('#historyjka').find('#rozgrywki_k0').append('<form method="post" action="uczestnicyRozgrywki.php"><input type="hidden" name="rozgrywkaH" value="'+val.id+'"  /> <button type="button" onclick="pobierzUczestnikow()" class="btn btn-default"><span style="display" class="userID" id='+val.id+'>'+val.id+' ['+val.host+'] ['+val.data+']</span></button> </form><br>');
             $('#historyjka').find('#rozgrywki_k0').append('<form method="post" action="uczestnicyRozgrywki.php" ><input type="hidden" name="rozgrywkaH" value="'+val.id+'"  /> <button type="button" onclick="pobierzUczestnikow('+val.id+')" class="btn btn-default"><span style="display" class="userID" id='+val.id+'>'+val.id+' ['+val.host+'] ['+val.data+']</span></button> <button type="submit" id="b'+val.id+'" style="display:none;"></button>  </form><br>');
             $a = val.id;
             jQuery.getJSON('historiaConnect.php', function( data )
             {
             $.each( data, function( key, val ) 
             {    
             // $("#znajomek").find('#wyliczanka').append('<li><span style="display" class="userID">'+val.id+'</span><a href="#">'+val.user+' ['+val.email+']</a></li>'); // z linkiem i id
             $('#historyjka').find('#rozgrywki_k0').append('<li><span style="display" class="userID">'+val.id+' ['+val.host+'] ['+val.data+']'+$a+'</li>');
             });
             }); ///////////////////////////////////////
             });
             });
             */

            toggleUczestnikow = function (idRozgrywki)
            {
                $('.uczestnicy' + idRozgrywki + '').toggle();
            };
        </script>
</body>
</html>