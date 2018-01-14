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

    public function testZakladaZe_WynikiDwochRzutowZostanaZwrocone()
    {
        $kregle = new Kregle();
        $kregle->rzut(3);
        $kregle->rzut(5);
              
        $this->assertEquals([3, 5], $kregle->podajWynikiRzutow());
    }
    
    function testZakladaZe_WynikJednejTuryZostanieZwrocony()
    {
        $kregle = new Kregle();
        $kregle->rzut(2);
        $kregle->rzut(1);
        
        $this->assertEquals([3], $kregle->podajWynikiTur());
    }
    
    function testZakladaZe_WynikPierwszejIDrugiejTuryZostanieZwrocony()
    {
        $kregle = new Kregle();
        $kregle->rzut(2);
        $kregle->rzut(1);
        $kregle->rzut(5);
        $kregle->rzut(5);
        
        
        $this->assertEquals([3, 10], $kregle->podajWynikiTur());
    }
    
    function testZakladaZe_WynikPierwszegoRzutuToDziesiec()
    {
        $kregle = new Kregle();
        $kregle->rzut(10);
       
        $this->assertEquals([10], $kregle->podajWynikiTur());
    }
    
    function testZakladaZe_WynikPierwszejRundyToStrike()
    {
        $kregle = new Kregle();
        $kregle->rzut(10);
       
        $this->assertEquals(["strike"], $kregle->podajTekstoweWynikiTur());
    }
    
    function testZakladaZe_WynikPierwszejRundyToSpare()
    {
        $kregle = new Kregle();
        $kregle->rzut(1);
        $kregle->rzut(9);
       
        $this->assertEquals(["spare"], $kregle->podajTekstoweWynikiTur());
    }
    
    function testZakladaZe_WynikiKolejnychTurToSpareStrikeILiczbowe()
    {
        $kregle = new Kregle();
        $kregle->rzut(1);
        $kregle->rzut(9);
        $kregle->rzut(10);
        $kregle->rzut(9);
        $kregle->rzut(1);
        $kregle->rzut(5);
        $kregle->rzut(1);
        $kregle->rzut(2);
        $kregle->rzut(1);
        $kregle->rzut(9);
        $kregle->rzut(1);
        $kregle->rzut(9);
        $kregle->rzut(1);
        $kregle->rzut(2);
        $kregle->rzut(5);
        $kregle->rzut(6);
        $kregle->rzut(2);
        $kregle->rzut(10);
            
        $this->assertEquals(["spare", "strike", "spare", 6, 3, "spare", "spare", 7, 8, "strike"], $kregle->podajTekstoweWynikiTur());
    }
}