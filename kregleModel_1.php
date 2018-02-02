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
