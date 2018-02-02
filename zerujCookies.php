<?php
    $zerowanieWartosciCookies = null;
    setcookie('mycookie', $zerowanieWartosciCookies);
    setcookie('runda', "1/10");
    setcookie('wynik', $zerowanieWartosciCookies);
    setcookie('tablicaWynikow', $zerowanieWartosciCookies);
    
    if(!isset($_COOKIE['mycookie']) && isset($_COOKIE['runda']) == 1 && !isset($_COOKIE['wynik']) && !isset($_COOKIE['tablicaWynikow'])){
        header("Location: ./view/pages/rzut-page.php");
    }else{
        header("Location: ./zerujCookies.php");
    }
?>