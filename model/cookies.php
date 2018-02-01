<?php
// Przeczytaj kod i odświeżaj stronę. Możesz eksperymentować.
// Aby odpalić serwer wpisz w linii poleceń "php -S localhost:8080" i php odpali Ci serwer lokalny z tym plikiem pod tym adresem: "localhost:8080/cookies.php"

// Tworzę zmienną, w której będę przechowywał ostatnio zapisanego JSON-a (JSON jest stringiem) z danymi
$oldListOfValuesInJsonFormat = "";

// Pobieram dane które już w tej chwili są zapisane w ciasteczku "mycookie" (jeśli w ogóle takie ciasteczko istnieje)
if (isset($_COOKIE["mycookie"])) {
    $oldListOfValuesInJsonFormat = $_COOKIE["mycookie"];
}

// wiem, ze dane będą w formacie JSON, więc je dekoduję do typu PHP-owego
$oldListOfValues = json_decode($oldListOfValuesInJsonFormat);

// Generuję nową tablice znaków (losowe liczby)
$listOfValues = [];
foreach($oldListOfValues as $old){
    $listOfValues[]             = $old;
}
for ($i = 0; $i < 2; $i++) {
    $listOfValues[] = rand(1, 10);
}

// koduję nową tablicę znaków do JSON-a
$listOfValuesInJsonFormat = json_encode($listOfValues);

// zapisuję JSON-a do ciasteczek w przeglądarce
setcookie('mycookie', $listOfValuesInJsonFormat);

echo "Stara tablica: " . $oldListOfValuesInJsonFormat . "<br>";
echo "Nowa Tablica: " . $listOfValuesInJsonFormat . "<br>";