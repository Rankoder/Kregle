<?php
    $zerowanieWartosciCookies = null;
    setcookie('mycookie', $zerowanieWartosciCookies);
    setcookie('runda', $zerowanieWartosciCookies);
    setcookie('wynik', $zerowanieWartosciCookies);
    
    if(!isset($_COOKIE['mycookie']) && !isset($_COOKIE['runda']) && !isset($_COOKIE['wynik'])){
        header("Location: ../view/pages/rzut-page.php");
    }else{
        header("Location: ./zerujCookies.php");
    }
?>