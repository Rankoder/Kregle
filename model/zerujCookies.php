<?php
    $listOfValuesInJsonFormat = null;
    setcookie('mycookie', $listOfValuesInJsonFormat);
    setcookie('runda', $listOfValuesInJsonFormat);
    header("Location: ../view/pages/rzut-page.php");
?>