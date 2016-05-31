$(document).ready(function(){ // standardowy pocz¹tek
    $('#main').css("display","none"); // sprawiamy, ¿e ca³a sekcja body nie jest wyœwietlana od razu po za³adowaniu siê strony
    $('#main').fadeIn(500); // ca³¹ sekcja body pojawia siê p³ynnie na ekranie za pomoc¹ efektu fadeIn w czasie 500ms (0.5 sekundy)
// powy¿szy kod wykona siê przy ka¿dym wczytywaniu strony
    $('a.transition').click(function(event){ // akcja jaka wykona siê po klikniêciu na link posiadaj¹cy klasê transition
        event.preventDefault(); // dziêki tej linijce wstrzymujemy domyœln¹ akcje jak¹ jest zwyk³e przekierowanie na kolejn¹ podstronê
        adres = this.href; // zmienna adres przyjmuje adres URL z klikniêtego linku
        $('#main').fadeOut(500, przekierowanieStrony); /* nastêpuje p³ynne zanikanie t³a za pomoc¹ efektu fadeOut.
         Efekt ten wykonywany jest równie¿ w czasie 500ms,
         a po jego zakoñczeniu wywo³ywana jest funkcja przekierowania.*/
    });
    function przekierowanieStrony() { // funkcja przekierowania
        window.location = adres; // dziêki tej linijce zostajemy przeniesieni na now¹ podstronê
    }
});/**
 * Created by delv on 2016-02-02.
 */
