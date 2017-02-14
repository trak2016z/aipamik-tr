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
                include 'leweMenu.php';
                ?>
            </div>

            <div style="min-width: 655px;">
                <div class="col-sm-1" style=" min-width: 100px;"> <!-- pomaga w responsywnosci--> </div>
                <div class="col-sm-3"> <!--style="background-color:lavenderblush;"> -->
                    <div class="divKarty">
                        <p style="padding-left: 105px;"><strong>Wysoka karta:</strong></p>
                        <div>

                            <img src="img/ace_of_hearts.png" width="60px" height="10%" alt="as czerwo">
                            <img src="img/10_of_spades.png" width="60px" height="10%" alt="10 wino">
                            <img src="img/6_of_diamonds.png" width="60px" height="10%" alt="6 dzwonek">
                            <img src="img/4_of_hearts.png" width="60px" height="10%" alt="4 czerwo">
                            <img src="img/2_of_clubs.png" width="60px" height="10%" alt="2 trefl">
                        </div>       
                        <p style="padding-left: 135px; padding-top: 10px;"><strong>Para:</strong></p>
                        <div>       

                            <img src="img/ace_of_hearts.png" width="60px" height="10%" alt="as czerwo">
                            <img src="img/ace_of_spades2.png" width="60px" height="10%" alt="as wino"> 
                            <img src="img/10_of_diamonds.png" width="60px" height="10%" alt="10 dzwonek"> 
                            <img src="img/7_of_clubs.png" width="60px" height="10%" alt="7 trefl">
                            <img src="img/5_of_hearts.png" width="60px" height="10%" alt="5 czerwo">          
                        </div>
                        <p style="padding-left: 120px; padding-top: 10px;"><strong>Dwie pary:</strong></p>
                        <div>
                            <img src="img/jack_of_hearts.png" width="60px" height="10%" alt="jopek czerwo">
                            <img src="img/jack_of_spades.png" width="60px" height="10%" alt="jopek wino">
                            <img src="img/9_of_diamonds.png" width="60px" height="10%" alt="9 dzwonek">
                            <img src="img/9_of_clubs.png" width="60px" height="10%" alt="9 trefl">
                            <img src="img/3_of_hearts.png" width="60px" height="10%" alt="3 czerwo">
                        </div>
                        <p style="padding-left: 130px; padding-top: 10px;"><strong>Trójka:</strong></p>
                        <div>
                            <img src="img/queen_of_hearts.png" width="60px" height="10%" alt="dama czerwo">
                            <img src="img/queen_of_spades.png" width="60px" height="10%" alt="dama wino">
                            <img src="img/queen_of_clubs.png" width="60px" height="10%" alt="dama trefl">
                            <img src="img/jack_of_hearts.png" width="60px" height="10%" alt="jopek czerwo">
                            <img src="img/10_of_diamonds.png" width="60px" height="10%" alt="10 dzwonek">
                        </div>
                        <p style="padding-left: 135px; padding-top: 10px;"><strong>Strit:</strong></p>
                        <div>
                            <img src="img/9_of_spades.png" width="60px" height="10%" alt="9 wino">
                            <img src="img/8_of_diamonds.png" width="60px" height="10%" alt="8 dzwonek">
                            <img src="img/7_of_diamonds.png" width="60px" height="10%" alt="7 dzwonek">
                            <img src="img/6_of_hearts.png" width="60px" height="10%" alt="6 czerwo">
                            <img src="img/5_of_clubs.png" width="60px" height="10%" alt="5 trefl">
                        </div>
                    </div>
                </div>
                <div class="col-sm-1"  style="min-width: 150px;" > <!-- pomaga w responsywności--> </div>
                <div class="col-sm-3">
                    <div class="divKarty">
                        <div>
                            <p style="padding-left: 130px;"><strong>Kolor:</strong></p>

                            <img src="img/jack_of_clubs.png" width="60px" height="10%" alt="jopek trefl">
                            <img src="img/10_of_clubs.png" width="60px" height="10%" alt="10 trefl">
                            <img src="img/6_of_clubs.png" width="60px" height="10%" alt="6 trefl">
                            <img src="img/4_of_clubs.png" width="60px" height="10%" alt="4 trefl">
                            <img src="img/2_of_spades.png" width="60px" height="10%" alt="2 trefl">
                        </div> 
                        <div>
                            <p style="padding-left: 135px; padding-top: 10px;"><strong>Full:</strong></p>

                            <img src="img/king_of_spades.png" width="60px" height="10%" alt="krol wino">
                            <img src="img/king_of_clubs.png" width="60px" height="10%" alt="krol trefl">
                            <img src="img/9_of_diamonds.png" width="60px" height="10%" alt="9 dzwonek">
                            <img src="img/9_of_spades.png" width="60px" height="10%" alt="9 wino">
                            <img src="img/9_of_clubs.png" width="60px" height="10%" alt="9 trefl">
                        </div>
                        <div>
                            <p style="padding-left: 130px; padding-top: 10px;"><strong>Kareta:</strong></p>

                            <img src="img/3_of_hearts.png" width="60px" height="10%" alt="3 czerwo">
                            <img src="img/3_of_diamonds.png" width="60px" height="10%" alt="3 dzwonek">
                            <img src="img/3_of_spades.png" width="60px" height="10%" alt="3 wino">
                            <img src="img/3_of_clubs.png" width="60px" height="10%" alt="3 trefl">
                            <img src="img/queen_of_hearts.png" width="60px" height="10%" alt="dama czerwo">
                        </div>
                        <div>
                            <p style="padding-left: 135px; padding-top: 10px;"><strong>Poker:</strong></p>

                            <img src="img/4_of_hearts.png" width="60px" height="10%" alt="4 czerwo">
                            <img src="img/5_of_hearts.png" width="60px" height="10%" alt="5 czerwo">
                            <img src="img/6_of_hearts.png" width="60px" height="10%" alt="6 czerwo">
                            <img src="img/7_of_hearts.png" width="60px" height="10%" alt="7 czerwo">
                            <img src="img/8_of_hearts.png" width="60px" height="10%" alt="8 czerwo">
                        </div>
                        <div>
                            <p style="padding-left: 105px; padding-top: 10px;"><strong>Poker królewski:</strong></p>

                            <img src="img/ace_of_spades2.png" width="60px" height="10%" alt="as wino">
                            <img src="img/king_of_spades.png" width="60px" height="10%" alt="krol wino">
                            <img src="img/queen_of_spades.png" width="60px" height="10%" alt="dama wino">
                            <img src="img/jack_of_spades.png" width="60px" height="10%" alt="jopek wino">
                            <img src="img/10_of_spades.png" width="60px" height="10%" alt="10 wino">
                        </div>        
                    </div>
                </div>
            </div>
        </div> <!-- /row -->
    </div>


</body>
</html>