<?php
if(isset($_COOKIE['mycookie'])){ 
    echo $_COOKIE['mycookie'];
}else{
    echo 'ciasteczko mycookie jest wyzerowane';
}

echo "<br>";

if(isset($_COOKIE['runda'])){ 
    echo $_COOKIE['runda'];
}else{
    echo 'ciasteczko runda jest wyzerowane';
}

echo "<br>";

if(isset($_COOKIE['wynik'])){ 
    echo $_COOKIE['wynik'];
}else{
    echo 'ciasteczko wynik jest wyzerowane';
}

echo "<br>";

if(isset($_COOKIE['tablicaWynikow'])){ 
    echo $_COOKIE['tablicaWynikow'];
}else{
    echo 'ciasteczko wynik jest wyzerowane';
}
