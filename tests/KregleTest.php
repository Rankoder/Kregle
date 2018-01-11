<?php
include "./Kregle.php";

use PHPUnit\Framework\TestCase;


class KregleTest extends TestCase
{
    public function testZakładajacZeGraszWKregle_CzyMozeszRozegracMaksymalnieDziesiecTur()
    {
        $kregle = new Kregle();
        $kregle->rzut(10);
        $kregle->rzut(10);
        $kregle->rzut(10);
        $kregle->rzut(10);
        $kregle->rzut(10);
        $kregle->rzut(10);
        $kregle->rzut(10);
        $kregle->rzut(10);
        $kregle->rzut(10);
        $kregle->rzut(10);
        $kregle->rzut(10);

        return $this->assertEquals(10, $kregle->podajRozegraneTury());
    }
    
  
    

    public function testZakładajacZeRzucaszOsiemRazyDziesiatke_JestesNaOsmejTorze()
    {
        $kregle = new Kregle();
        $kregle->rzut(10);
        $kregle->rzut(10);
        $kregle->rzut(10);
        $kregle->rzut(10);
        $kregle->rzut(10);
        $kregle->rzut(10);
        $kregle->rzut(10);
        $kregle->rzut(10);

        $this->assertEquals(8, $kregle->podajRozegraneTury());
    }

    public function testZakładajacZePierwszyRzutJestMniejszyOdDziesieciu_RzucaszDrugiRazWTejSamejTurze()
    {
        $kregle = new Kregle();
        $kregle->rzut(5);
        $kregle->rzut(5);

        $this->assertEquals(1, $kregle->podajRozegraneTury());
    }

    public function testZakładajacZeRzucamyczteryNormalneRzutyIJednegoStraika_NaliczyTrzyTury()
    {
        $kregle = new Kregle();
        $kregle->rzut(3);
        $kregle->rzut(3);
        $kregle->rzut(3);
        $kregle->rzut(3);
        $kregle->rzut(10);

        $this->assertEquals(3, $kregle->podajRozegraneTury());
    }

    public function testZakładajacZeWypadaStraik_PrzechodziDoNastepnejTury()
    {
        $kregle = new Kregle();
        $kregle->rzut(10);

        $this->assertEquals(1, $kregle->podajRozegraneTury());
    }

    public function testZakładajacZeWynikRzutyJestMniejszyNizDziesiec_NiePrzechodziDoNastepnejTury()
    {
        $kregle = new Kregle();
        $kregle->rzut(3);

        $this->assertEquals(0, $kregle->podajRozegraneTury());
    }

    public function testZakładajacZeZbijeszTrzyKregle_OtrzymujeszTrzyPunkty()
    {
        $kregle = new Kregle();
        $kregle->rzut(3);

        $this->assertEquals(3, $kregle->podajPunktacje());
    }

    public function testZakładajacZeZbijeszSzescPunktowWDwochRzutach()
    {
        $kregle = new Kregle();
        $kregle->rzut(3);
        $kregle->rzut(5);

        $this->assertEquals(8, $kregle->podajPunktacje());
    }   
    
    public function testZakladaZeZbijeszPiecPunktowWPierwszejTurze()
    {
        $kregle = new Kregle();
        $kregle->rzut(3);
        $kregle->rzut(2);
        

        $this->assertEquals(5, $kregle->podajWynikAktualnejTury());
    } 
    
    public function testZakladaZeZbijeszSzescPunktowWDrugiejTurze()
    {
        $kregle = new Kregle();
        $kregle->rzut(3);
        $kregle->rzut(2);
        $kregle->rzut(3);
        $kregle->rzut(3);
        

        $this->assertEquals(6, $kregle->podajWynikAktualnejTury());
    } 
}