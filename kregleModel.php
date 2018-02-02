<?php
require './controllers/Kregle.php';

$poprzedniaTablicaRzutowJSONFormat = "";

if (isset($_COOKIE["tablicaWynikow"])) {
    $poprzedniaTablicaRzutowJSONFormat = $_COOKIE["tablicaWynikow"];
}

$poprzedniaTablicaRzutow = json_decode($poprzedniaTablicaRzutowJSONFormat);

$tablicaRzutow = [];

$gra = new Kregle();
$iloscKregli = $_COOKIE['wynikOstatniegoRzutu'];

if (isset($_COOKIE["tablicaWynikow"])) {
    foreach($poprzedniaTablicaRzutow as $rzut){
        $tablicaRzutow[] = $rzut;
        $gra->rzut($rzut);
    }
}

if($gra->podajRozegraneTury() <= 9){   
    if($gra->podajCzyJestDrugiRzut() == true){            
        $gra->rzut($iloscKregli = rand(0, 10 - $iloscKregli));
        $tablicaRzutow[] = $iloscKregli;
    }else{                     
        $gra->rzut($iloscKregli = rand(0, 10));
        $tablicaRzutow[] = $iloscKregli;          
    }
    
    $runda = ($gra->podajRozegraneTury() + 1);
        if($runda > 10){
            setcookie('runda', 'Wynik');
        }else{
            setcookie('runda', "$runda/10" );
        }
    
    $aktualnaTablicaRzutow = json_encode($tablicaRzutow);
    setcookie('tablicaWynikow', $aktualnaTablicaRzutow);
    setcookie('wynikOstatniegoRzutu', $iloscKregli);    
    header("Location: ./view/pages/rzut-page.php");
}elseif($gra->podajCzyJestDogrywka() != false){         
    $gra->rzut($iloscKregli = rand(0, 10));
    $tablicaRzutow[] = $iloscKregli; 
    $aktualnaTablicaRzutow = json_encode($tablicaRzutow);
    $runda = 10;
    
    setcookie('tablicaWynikow', $aktualnaTablicaRzutow);
    setcookie('runda', $runda);
    setcookie('wynikOstatniegoRzutu', $iloscKregli);    
    header("Location: ./view/pages/rzut-page.php");
}else{    
    $wynik = $gra->podajPunktacje();
    setcookie('wynik', $wynik);
    header("Location: ./view/pages/wynik-page.php");   
}