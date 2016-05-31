$(document).ready(function(){ // standardowy pocz�tek
    $('#main').css("display","none"); // sprawiamy, �e ca�a sekcja body nie jest wy�wietlana od razu po za�adowaniu si� strony
    $('#main').fadeIn(500); // ca�� sekcja body pojawia si� p�ynnie na ekranie za pomoc� efektu fadeIn w czasie 500ms (0.5 sekundy)
// powy�szy kod wykona si� przy ka�dym wczytywaniu strony
    $('a.transition').click(function(event){ // akcja jaka wykona si� po klikni�ciu na link posiadaj�cy klas� transition
        event.preventDefault(); // dzi�ki tej linijce wstrzymujemy domy�ln� akcje jak� jest zwyk�e przekierowanie na kolejn� podstron�
        adres = this.href; // zmienna adres przyjmuje adres URL z klikni�tego linku
        $('#main').fadeOut(500, przekierowanieStrony); /* nast�puje p�ynne zanikanie t�a za pomoc� efektu fadeOut.
         Efekt ten wykonywany jest r�wnie� w czasie 500ms,
         a po jego zako�czeniu wywo�ywana jest funkcja przekierowania.*/
    });
    function przekierowanieStrony() { // funkcja przekierowania
        window.location = adres; // dzi�ki tej linijce zostajemy przeniesieni na now� podstron�
    }
});/**
 * Created by delv on 2016-02-02.
 */
