<?php
require '../controllers/Kregle.php';

$gra = new Kregle();
$iloscKregli = 0;
$j = 1;
$wynik = 0;
     
    while($gra->podajRozegraneTury() <= 9){   
        if($gra->podajCzyJestDrugiRzut() == true){
            echo "Numer Tury: (".($gra->podajRozegraneTury() + 1);
            $gra->rzut($iloscKregli = rand(0, 10 - $iloscKregli));
            echo ") \n Numer Rzutu: ($j) \n Wynik Rzutu: ($iloscKregli) <br>";
            $j++;
            $wynik += $iloscKregli;
        }else{
            echo "Numer Tury: (".($gra->podajRozegraneTury() + 1);            
            $gra->rzut($iloscKregli = rand(0, 10));
            echo ") \n Numer Rzutu: ($j) \n Wynik Rzutu: ($iloscKregli) <br>";
            $j++;
            $wynik += $iloscKregli;
        }
    }
    while($gra->podajCzyJestDogrywka() != false){           
        echo "Numer Tury: (".($gra->podajRozegraneTury() + 1);
        $gra->rzut($iloscKregli = rand(0, 10 - $iloscKregli));
        echo ") \n Numer Rzutu: ($j) \n Wynik Rzutu: ($iloscKregli) <br>";
        $j++;
        $wynik += $iloscKregli;
    }
    
foreach($gra->podajWynikiRzutow() as $punktacjiaTur){
    echo "$punktacjiaTur \n";
}    
echo "<br>";          
echo $gra->podajPunktacje();
echo "\n $wynik ";

$oldListOfValuesInJsonFormat = "";


if (isset($_COOKIE["mycookie"])) {
    $oldListOfValuesInJsonFormat = $_COOKIE["mycookie"];
}


$oldListOfValues = json_decode($oldListOfValuesInJsonFormat);

$listOfValues = [];
foreach($oldListOfValues as $old){
    $listOfValues[] = $old;
}
for ($i = 0; $i < 2; $i++) {
    $listOfValues[] = rand(1, 10);
}


$listOfValuesInJsonFormat = json_encode($listOfValues);


setcookie('mycookie', $listOfValuesInJsonFormat);
ECHO "<br>";
echo "Stara tablica: " . $oldListOfValuesInJsonFormat . "<br>";
echo "Nowa Tablica: " . $listOfValuesInJsonFormat . "<br>";

$numerRundy = ($gra->numerTury() + 1);
setcookie('runda', $numerRundy);
header("Location: ../view/pages/rzut-page.php");
//header("Location: ../view/pages/wynik-page.php");
