<?php
    $zerowanieWartosciCookies = null;
    setcookie('wynikOstatniegoRzutu', $zerowanieWartosciCookies);
    setcookie('runda', "1/10");
    setcookie('wynik', $zerowanieWartosciCookies);
    setcookie('tablicaWynikow', $zerowanieWartosciCookies);
    
    if(wynikOstatniegoRzutu() && runda() && wynik() && tablicaWynikow()){
        header("Location: ./view/pages/rzut-page.php");
    }else{
        header("Location: ./zerujCookies.php");
    }
    
    function wynikOstatniegoRzutu()
    {
       return !isset($_COOKIE['wynikOstatniegoRzutu']); 
    }
    
    function runda()
    {
        return isset($_COOKIE['runda']) == 1;
    }
    
    function wynik()
    {
        return !isset($_COOKIE['wynik']);
    }
    
    function tablicaWynikow()
    {
        return !isset($_COOKIE['tablicaWynikow']);
    }
?>