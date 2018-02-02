<?php
require './controllers/Kregle.php';

$poprzedniaTablicaRzutowJSONFormat = "";

if (isset($_COOKIE["tablicaWynikow"])) {
    $poprzedniaTablicaRzutowJSONFormat = $_COOKIE["tablicaWynikow"];
}

$poprzedniaTablicaRzutow = json_decode($poprzedniaTablicaRzutowJSONFormat);

$tablicaRzutow = [];

if (isset($_COOKIE["tablicaWynikow"])) {
    foreach($poprzedniaTablicaRzutow as $rzut){
        $tablicaRzutow[] = $rzut;
    }
}

$gra = new Kregle();
$iloscKregli = 0;
$j = 1;

if (isset($_COOKIE["tablicaWynikow"])) {
    foreach($tablicaRzutow as $rzut){
        echo "Numer Tury: (".($gra->podajRozegraneTury() + 1);
        $iloscKregli = $gra->rzut($rzut);
        echo ") \n Numer Rzutu: ($j) \n Wynik Rzutu: ($iloscKregli) <br>";
        $j++;    
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
    setcookie('runda', $runda);
    $aktualnaTablicaRzutow = json_encode($tablicaRzutow);
    setcookie('tablicaWynikow', $aktualnaTablicaRzutow);
    
    //header("Location: ../view/pages/rzut-page.php");
}elseif($gra->podajCzyJestDogrywka() != false){         
    $gra->rzut($iloscKregli = rand(0, 10 - $iloscKregli));
    $tablicaRzutow[] = $iloscKregli; 
    $aktualnaTablicaRzutow = json_encode($tablicaRzutow);
    setcookie('tablicaWynikow', $aktualnaTablicaRzutow);
    $runda = 10;
    setcookie('runda', $runda);
    
    //header("Location: ../view/pages/rzut-page.php");
}else{    
    $wynik = $gra->podajPunktacje();
    setcookie('wynik', $wynik);
    //header("Location: ./view/pages/wynik-page.php");   
}