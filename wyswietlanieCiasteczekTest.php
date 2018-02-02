<?php
if(isset($_COOKIE['mycookie'])){ 
    echo "wynikOstatniegoRzutu: ". $_COOKIE['wynikOstatniegoRzutu'];
}else{
    echo 'ciasteczko mycookie jest wyzerowane';
}

echo "<br>";

if(isset($_COOKIE['runda'])){ 
    echo "runda: ". $_COOKIE['runda'];
}else{
    echo 'ciasteczko runda jest wyzerowane';
}

echo "<br>";

if(isset($_COOKIE['wynik'])){ 
    echo "wynik". $_COOKIE['wynik'];
}else{
    echo 'ciasteczko wynik jest wyzerowane';
}

echo "<br>";

if(isset($_COOKIE['tablicaWynikow'])){ 
    echo "tablica wynikow: " . $_COOKIE['tablicaWynikow'];
}else{
    echo 'ciasteczko wynik jest wyzerowane';
}
