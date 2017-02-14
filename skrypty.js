
stworzZetony = function ()
{
    var tZetonow = document.getElementById('iloscTypowZetonow').value;
    
    if(tZetonow<1)
    {
       document.getElementById('iloscTypowZetonow').value = 1; 
       tZetonow = 1;
    }
    if(tZetonow>9)
    {
        document.getElementById('iloscTypowZetonow').value = 9;
        tZetonow = 9;
    }
    
    var noweInputy = "";

    // wstawianie nowych inputów; tyle ile typów żetonów
    for (i = 0; i < tZetonow; i++)
    { // 
        //noweInputy +="<strong>" + (i+1) + ". Ilość: </strong> " + "<input o onkeypress='return event.charCode >= 48 && event.charCode <= 57' style=\"width:100px;\" id=\"x"+ i + "\" type=\"text\" />"  + "<strong>  Wartość: </strong>" +  "<input onkeypress='return event.charCode >= 48 && event.charCode <= 57' style=\"width:100px;\" id=\"y" + i + "\" type=\"text\" />" + "  <strong>Podział: </strong> " +  "<input onkeypress='return event.charCode >= 48 && event.charCode <= 57' style=\"width:100px;\" id=\"z" + i + "\" type=\"text\" />" + "<br>";                  
        noweInputy += "<div> <strong>" + (i + 1) + ". Ilość: </strong> " + "<input onblur=\"oblicz()\" onkeypress='return event.charCode >= 48 && event.charCode <= 57' style=\"width:100px;\" id=\"x" + i + "\" type=\"text\" />" + "<strong>  Wartość: </strong>" + "<div style=\"padding-left:10px; padding-right:10px; padding-top: 2px; position:absolute; display: inline;\" id=\"y" + i + "\" type=\"text\" ></div>" + "  <strong style=\"padding-left: 50px;\">Podział: </strong> " + "<div style=\"width:100px; padding-left: 10px; padding-right: 10px; display: inline;\" id=\"z" + i + "\" type=\"text\" > </div>" + "<br> </div>";

    }

    document.getElementById("dynamiczny").innerHTML = noweInputy;
    var temp = "";

    // 
    for (i = 0; i < tZetonow; i++) // ustawienie ilości poszczególnych żetonów na 100, inna możliwość: w inpucie "value", ha.
    {
        temp = "x" + i;
        document.getElementById(temp).value = 100;
        temp = "";
    }


};

sprawdzWartosc = function (x)
{
    if (x == 0)
    {
        return x + 1;
    }
    else
        return x;
};

oblicz = function ()
{
    var tZetonow = document.getElementById('iloscTypowZetonow').value;
    var lGraczy = document.getElementById('liczbaGraczy').value;
    var wplata = document.getElementById('wplata').value;
    
    if (wplata>10000)
    {
        document.getElementById('wplata').value = 10000;
        wplata = 10000;
    }
  
    if(tZetonow<0)
    {
       document.getElementById('iloscTypowZetonow').value = 1; 
       tZetonow = 1;
    }
    if(tZetonow>9)
    {
        document.getElementById('iloscTypowZetonow').value = 9;
        tZetonow = 9;
    }

    var bb = 0;
    bb = wplata / 50;

    var sb = bb / 2;
    var temp = "";
    var z = 1; // zmienna pomocnicza, ktora co 3 iteracje bedzie mnozona co 10
    for (i = 0; i < tZetonow; i++) // obliczanie wartości poszczególnych żetonów
    {
        temp = "y" + i; // id kolejnych inputow, y1, y2, y3
        if (i == 0) {

            document.getElementById(temp).innerHTML = sprawdzWartosc(Math.floor(sb));
        }
        else if (i == 1) {
            document.getElementById(temp).innerHTML = sprawdzWartosc(Math.floor(bb));
        }
        else if (i == 2) {
            document.getElementById(temp).innerHTML = sprawdzWartosc(Math.floor(bb * 2.5));
        }

        else if (i % 3 == 0) {
            document.getElementById(temp).innerHTML = sprawdzWartosc(Math.floor(bb * 5 * z));
        }
        else if (i % 3 == 1) {
            document.getElementById(temp).innerHTML = sprawdzWartosc(Math.floor(bb * 12.5 * z));
        }
        else if (i % 3 == 2) {
            document.getElementById(temp).innerHTML = sprawdzWartosc(Math.floor(bb * 25 * z));
            z = z * 10
        }

        else // test czy nie wypisze gdzieś
        {
            document.getElementById(temp).innerHTML = 1337;
        }

        temp = "";
    }

    var temp1 = "";

    //var test = document.getElementById('y1').value;
    //document.getElementById('z1').value = test;
    var wTab = []; // tablica zawierajaca wartosci poszczegolnych zetonow
    var iTab = []; // tablica zawierajaca ilosci poszczegolnych zetonow

    for (i = 0; i < tZetonow; i++) // pobieranie wartości poszczególnych typów żetonów do tablicy
    {
        temp = "y" + i;
        temp1 = "x" + i;
        wTab[i] = document.getElementById(temp).innerHTML;
        iTab[i] = document.getElementById(temp1).value;
        temp = "";
        temp1 = "";
    }

    var pTab = []; // tablica zawierajaca podzial poszczegolnych zetonow
    var pTabMax = []; // tablica zawierajaca maksymalna liczbe poszczegolnych zetonow ze wzgledu na graczy

    for (i = 0; i < tZetonow; i++) //  inicjalizacja, ustawienie kazdego elementu pTab na 0
    {
        pTab[i] = 0;
        pTabMax[i] = 1;
    }

    for (i = tZetonow - 1; i >= 0; i--) // usuwanie elementow o wiekszej wartosci niz wplata (lub równej)
    {
        if (wplata - wTab[i] <= 0)
        {
            pTab.pop(); // zostanie usuniety ostatni element, a skoro sprawdza od konca, to na pewno bedzie to ten sprawdzany teraz, czyli pTab[i]
            pTabMax.pop();
        }
    }

    for (i = 0; i < pTabMax.length; i++) // obliczanie maksymalnej ilości żetonów dla danego gracza, ze względu na ilość żetonów i graczy
    {
        pTabMax[i] = Math.floor(iTab[i] / lGraczy);
    }

    var procentWplaty = wplata / 100; // zmienna pomocnicza określająca 1 procent wpłaty

    var resztaWplaty = wplata; // - pTab[0]*wTab[0]; // ile zostalo pieniazkow do rozdzielenia zetonami

    if (pTab.length > 1) // jeśli jest wieksza ilosc typow zetonow niz 1
    {
        while (pTab[1] * wTab[1] < 40 * procentWplaty)
        {
            pTab[1] += 1;
            if (pTab[1] > pTabMax[1]) {
                pTab[1] -= 1;
                break;
            }
            if (pTab[i] * wTab[i] >= wplata) {
                pTab[1] -= 1;
                break;
            }
        }
        resztaWplaty -= pTab[1] * wTab[1];
    }

    if (resztaWplaty > 0)
    {
        var flag = 0;
        var fWplata = 0;
        //var TESTOWA = 0;
        for (r = 1; r < 10; r++)
        {
            for (i = 0; i < pTab.length; i++) // -TESTOWA
            {
                while (pTab[i] * wTab[i] < r * 10 * procentWplaty)
                {
                    fWplata = 0;
                    pTab[i] += 1;
                    if (pTab[i] > pTabMax[i]) {
                        pTab[i] -= 1;
                        break;
                    } // jeśli przekroczy limit to cofamy dodanie żetona i brejkujemy
                    for (j = 0; j < pTab.length; j++) // całościowe obliczanie sumy żetonów
                    {
                        fWplata += pTab[j] * wTab[j]; // obliczanie o tu - CAŁOŚCIOWO
                    }
                    if (fWplata > wplata)
                    {
                        pTab[i] -= 1;
                        // TESTOWA += 1;
                        flag += 1; //
                        break;
                    }

                }
                if (flag == 15) {
                    break;
                } // UWAGA! można to lepiej - flaga wychodzi przy dużych żetonach~ (raczej?)
            }
        }
    }

    for (i = 0; i < pTab.length; i++) // wpisywanie podziału żetonów
    {
        temp = "z" + i;
        document.getElementById(temp).innerHTML = pTab[i];
        temp = "";
    }

    var realnaWplata = 0; // zmienna okreslajaca relna wartosc wplaty
    for (i = 0; i < pTab.length; i++)
    {
        realnaWplata += pTab[i] * wTab[i]; // iloczyn podziału żetonów z ich wartością (suma wartości żetonów w grze)
    }

    document.getElementById('realnaWplata').innerHTML = realnaWplata;


};

// pobierz modal
var modal = document.getElementById('myModal');

// pobieramy przycisk modalu
var btn = document.getElementById("dodajRB");

// pobieramy <span> ktory zamyka modal
var span = document.getElementsByClassName("close")[0];

// jak wcisniemy przycisk otwiera sie modal
btn.onclick = function () {
    modal.style.display = "block";
};

// zamykanie modalu
span.onclick = function () {
    modal.style.display = "none";
};

// jak gdziekolwiek indziej klikniemy to zamykamy modal
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
};

$("#dodajRB").click(function ()
{
    //alert("Rozgrywka dodana");
    $("#dodajRB").hide();
    $("#rozgrywkowy").show();
    jQuery.getJSON('rozgrywkaDodajConnect.php', function (data) { // dodajemy hosta do rozgrywki
    });

    jQuery.getJSON('pobierzNowaRozgrywka.php', function (data)
    {
        $.each(data, function (key, val)
        {
            $(".pomoc1").find('.pomoc2').append('<li><span style="display:none" class="userID">' + val.id + '</span>' + val.data + '</li>');
            $rozgrywkaID = val.id;
        });
    });
});





jQuery.getJSON('znajomiConnect.php', function (data)
{
    $.each(data, function (key, val)
    {
        $(".dropdown").find('.dropdown-menu').append('<li><span style="display:none" class="userID">' + val.id + '</span><a href="#" onclick="kliku(' + val.id + ', \'' + val.user + '\')">' + val.user + ' [' + val.email + ']</a></li>');
    });
});

dodajHostaInputs = function ()
{
    $("#graczeID").show();
    $("#zapiszRozgrywkeButton").show();
    jQuery.getJSON('dodajHostaJSON.php', function (data)
    {
        $.each(data, function (key, val)
        {

            $idU = val.idU;
            $userU = val.userU;

            if ($("#userek" + $userU + "").length) // sprawdzamy czy znajomy dodany do gry
            {
                return 0;
            }

            var ileTypowZetonow = document.getElementById('iloscTypowZetonow').value;

            var inputKoncowy = "";

            //$("#rozgrywkowy").find('.gracze').append('<div id="userek' + $userU + '"><li>klasyk ' + $idU + ' userek: ' + $userU + ' typow: ' + ileTypowZetonow + '</li></div>');
            $("#rozgrywkowy").find('.gracze').append('<div id="userek' + $userU + '" ><li><strong>' + $userU + '</strong></li></div>');

            for (i = 0; i < ileTypowZetonow; i++) // tworzenie inputow pozostalych po grze zetonow kazdego gracza
            { // 
                inputKoncowy += "<div> <strong>" + (i + 1) + ". Ilość</strong> " + "<input style=\"width: 100px;\" id=\"" + $userU + "r" + i + "\" type=\"text\" value=\"0\" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onblur=\"obliczBilans('" + $userU + "', " + ileTypowZetonow + ")\" />" + "<br> </div>";
            }


            $("#rozgrywkowy").find('#userek' + $userU + '').append('' + inputKoncowy + '');
            $("#rozgrywkowy").find('#userek' + $userU + '').append('<div style="padding-left:1px; padding-top: 5px;"> <strong>Bilans: </strong> <input  style="width: 100px;" value="0" name="uczestnik[' + $idU + ']" id="' + $userU + 'bilans"></input></div> <br>');


        });
    });
};

kliku = function (id, user)
{

    if ($("#userek" + user + "").length) // sprawdzamy czy znajomy dodany do gry
    {
        //istnienie = true;

        alert("Znajomy już dodany do gry!");
        return 0;
    }

    if (!sprawdzDane())
        return 0; // sprawdzamy czy ustawiona zostala wplata, ilosc typow zetonow i liczba graczy

    var ileGraczyMax = parseInt(document.getElementById('liczbaGraczy').value);
    var ileGraczyTeraz = parseInt(document.getElementById('ileZnajomychDodanych').value);

    if (ileGraczyMax <= ileGraczyTeraz)
    {
        alert("Limit graczy!");
        return 0;
    }
    ileGraczyTeraz += 1;

    document.getElementById('ileZnajomychDodanych').value = parseInt(ileGraczyTeraz);


    var ileTypowZetonow = document.getElementById('iloscTypowZetonow').value;


    var inputKoncowy = "";

    $("#rozgrywkowy").find('.gracze').append('<div id="userek' + user + '"><li><strong>' + user + '</strong></li></div>');

    for (i = 0; i < ileTypowZetonow; i++) // tworzenie inputow pozostalych po grze zetonow kazdego gracza
    { // 
        inputKoncowy += "<strong>" + (i + 1) + ". Ilość</strong> " + "<input style=\"width: 100px;\" id=\"" + user + "r" + i + "\" onkeypress='return event.charCode >= 48 && event.charCode <= 57' type=\"text\" value=\"0\" onblur=\"obliczBilans('" + user + "', " + ileTypowZetonow + ")\" />" + "<br>";
    }

    $("#rozgrywkowy").find('#userek' + user + '').append('' + inputKoncowy + '');
    $("#rozgrywkowy").find('#userek' + user + '').append('<div style="padding-left:1px; padding-top: 5px;"> <strong>Bilans: </strong> <input style="width: 100px;" value="0" name="uczestnik[' + id + ']" id="' + user + 'bilans"></div></p>'); // dodawanie bilansu



};

obliczBilans = function (user, ileTypowZetonow) //
{
    var z = 0;
    var y = "";
    var pom = "";
    var wynik = 0;
    for (i = 0; i < ileTypowZetonow; i++)
    {
        y = "y" + i; // wartość poszczególnych żetonów
        pom = user;
        pom += "r" + i; // 
        // y += i;
        z = parseInt(document.getElementById(pom).value);
        z = z * document.getElementById(y).innerHTML;
        wynik += z;

    }
    var u = user + "bilans"
    document.getElementById(u).value = wynik;
};

sprawdzDane = function () // sprawdzamy czy ustawiona zostala wplata, ilosc typow zetonow i liczba graczy
{

    if (!czyUstawiona('liczbaGraczy'))
    {
        alert("Ustaw liczbe graczy!");
        return false;
    }

    if (!czyUstawiona('wplata'))
    {
        alert("Ustaw wplate!");
        return false;
    }

    if (!czyUstawiona('iloscTypowZetonow'))
    {
        alert("Ustaw ilosc typow zetonow!");
        return false;
    }

    return true
};

czyUstawiona = function (x)
{
    var y = document.getElementById(x).value;

    if (y == 0 || y == "")
        return false;
    else
        return true;
};

$(window).scroll(function () { // hmć
    $(".slideanim").each(function ()
    {
        var pos = $(this).offset().top;

        var winTop = $(window).scrollTop();
        if (pos < winTop + 600)
        {
            $(this).addClass("slide");
        }
    });
});

                       