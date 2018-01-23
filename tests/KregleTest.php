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

    public function testZakladaZe_WynikiDwochRzutowZostanaZwrocone()
    {
        $kregle = new Kregle();
        $kregle->rzut(3);
        $kregle->rzut(5);
              
        $this->assertEquals([3, 5], $kregle->podajWynikiRzutow());
    }
    
    public function testZakladaZeZostanieZwroconaTablicaZWynikamiSamychStrikowCoRunde()
    {
        $kregle = new Kregle();
        $kregle->rzut(10); // 1
        $kregle->rzut(10); // 2
        $kregle->rzut(10); // 3
        $kregle->rzut(10); // 4
        $kregle->rzut(10); // 5
        $kregle->rzut(10); // 6
        $kregle->rzut(10); // 7
        $kregle->rzut(10); // 8
        $kregle->rzut(10); // 9
        $kregle->rzut(10); // 10
        $kregle->rzut(10); // 11
        $kregle->rzut(10); // 12          
      
        $this->assertEquals([30, 30, 30, 30, 30, 30, 30, 30, 30, 30], $kregle->podajPunktacjeZKazdejRundy());
    }
    
    public function testZakladaZeZostanieZwroconaTablicaZWynikamiSamychSparowCoRunde()
    {
        $kregle = new Kregle();
        $kregle->rzut(5); // 1
        $kregle->rzut(5); // 2
        $kregle->rzut(5); // 1
        $kregle->rzut(5); // 2
        $kregle->rzut(5); // 1
        $kregle->rzut(5); // 2
        $kregle->rzut(5); // 1
        $kregle->rzut(5); // 2
        $kregle->rzut(5); // 1
        $kregle->rzut(5); // 2
        $kregle->rzut(5); // 1
        $kregle->rzut(5); // 2
        $kregle->rzut(5); // 1
        $kregle->rzut(5); // 2
        $kregle->rzut(5); // 1
        $kregle->rzut(5); // 2
        $kregle->rzut(5); // 1
        $kregle->rzut(5); // 2
        $kregle->rzut(5); // 1
        $kregle->rzut(5); // 2
        $kregle->rzut(5); // 1
        $kregle->rzut(5); // 2
        
      
        $this->assertEquals([15, 15, 15, 15, 15, 15, 15, 15, 15, 15], $kregle->podajPunktacjeZKazdejRundy());
    }
    
    public function testZakladaPunktacjeStopiedziesiat()
    {
        $kregle = new Kregle();
        $kregle->rzut(5); // 1
        $kregle->rzut(5); // 2
        $kregle->rzut(5); // 1
        $kregle->rzut(5); // 2
        $kregle->rzut(5); // 1
        $kregle->rzut(5); // 2
        $kregle->rzut(5); // 1
        $kregle->rzut(5); // 2
        $kregle->rzut(5); // 1
        $kregle->rzut(5); // 2
        $kregle->rzut(5); // 1
        $kregle->rzut(5); // 2
        $kregle->rzut(5); // 1
        $kregle->rzut(5); // 2
        $kregle->rzut(5); // 1
        $kregle->rzut(5); // 2
        $kregle->rzut(5); // 1
        $kregle->rzut(5); // 2
        $kregle->rzut(5); // 1
        $kregle->rzut(5); // 2
        $kregle->rzut(5); // 1
        $kregle->rzut(5); // 2          
      
        $this->assertEquals(150, $kregle->podajPunktacje());
    }
    
    public function testZakladaMaksymalnaIloscWynikow()
    {
        $kregle = new Kregle();
        $kregle->rzut(10); // 1
        $kregle->rzut(10); // 2
        $kregle->rzut(10); // 3
        $kregle->rzut(10); // 4
        $kregle->rzut(10); // 5
        $kregle->rzut(10); // 6
        $kregle->rzut(10); // 7
        $kregle->rzut(10); // 8
        $kregle->rzut(10); // 9
        $kregle->rzut(10); // 10
        $kregle->rzut(10); // 11
        $kregle->rzut(10); // 12          
      
        $this->assertEquals(300, $kregle->podajPunktacje());
    }
    public function testZakladaZeWDziesiatejTurzeRzutToStrikeWynikToTrzysta()
    {
        $kregle = new Kregle();
        $kregle->rzut(10); // 1
        $kregle->rzut(10); // 2
        $kregle->rzut(10); // 3
        $kregle->rzut(10); // 4
        $kregle->rzut(10); // 5
        $kregle->rzut(10); // 6
        $kregle->rzut(10); // 7
        $kregle->rzut(10); // 8
        $kregle->rzut(10); // 9
        $kregle->rzut(10); // 10
        $kregle->rzut(10); // 11
        $kregle->rzut(10); // 12          
      
        $this->assertEquals(300, $kregle->podajPunktacje());
    }
    
    public function testZakladaZeWDziesiatejTurzeRzutyToSpareAWynikToDwiescieSiedemdziesiatDwa()
    {
        $kregle = new Kregle();
        $kregle->rzut(10); // 1
        $kregle->rzut(10); // 2
        $kregle->rzut(10); // 3
        $kregle->rzut(10); // 4
        $kregle->rzut(10); // 5
        $kregle->rzut(10); // 6
        $kregle->rzut(10); // 7
        $kregle->rzut(10); // 8
        $kregle->rzut(10); // 9
        $kregle->rzut(2); // 10
        $kregle->rzut(8); // 10
        $kregle->rzut(10); // 11          
      
        $this->assertEquals(272, $kregle->podajPunktacje());
    }
    
    public function testZakladaZeWDziesiatejTurzeRzutyToPiecZbitychKregliAWynikToDwiesciePiedziesiatDwa()
    {
        $kregle = new Kregle();
        $kregle->rzut(10); // 1
        $kregle->rzut(10); // 2
        $kregle->rzut(10); // 3
        $kregle->rzut(10); // 4
        $kregle->rzut(10); // 5
        $kregle->rzut(10); // 6
        $kregle->rzut(10); // 7
        $kregle->rzut(10); // 8
        $kregle->rzut(10); // 9
        $kregle->rzut(2); // 10
        $kregle->rzut(3); // 11         
      
        $this->assertEquals(252, $kregle->podajPunktacje());
    }
    
    public function testZakladaZeWDziesiatejTurzeRzutyToPiecZbitychKregliIJestZeroRzutowWiecej()
    {
        $kregle = new Kregle();
        $kregle->rzut(10); // 1
        $kregle->rzut(10); // 2
        $kregle->rzut(10); // 3
        $kregle->rzut(10); // 4
        $kregle->rzut(10); // 5
        $kregle->rzut(10); // 6
        $kregle->rzut(10); // 7
        $kregle->rzut(10); // 8
        $kregle->rzut(10); // 9
        $kregle->rzut(2); // 10
        $kregle->rzut(3); // 10         
      
        $this->assertEquals(0, $kregle->podajCzyJestDogrywka());
    }
    
    public function testZakladaZeWDziesiatejTurzeRzutyToSpareIJestJedenRzutWiecej()
    {
        $kregle = new Kregle();
        $kregle->rzut(10); // 1
        $kregle->rzut(10); // 2
        $kregle->rzut(10); // 3
        $kregle->rzut(10); // 4
        $kregle->rzut(10); // 5
        $kregle->rzut(10); // 6
        $kregle->rzut(10); // 7
        $kregle->rzut(10); // 8
        $kregle->rzut(10); // 9
        $kregle->rzut(5); // 10
        $kregle->rzut(5); // 10  
        $kregle->rzut(5); // 11  
      
        $this->assertEquals(1, $kregle->podajCzyJestDogrywka());
    }
    
    public function testZakladaZeWDziesiatejTurzePadnieStrikeIBedaDwaDodatkoweRzuty()
    {
        $kregle = new Kregle();
        $kregle->rzut(10); // 1
        $kregle->rzut(10); // 2
        $kregle->rzut(10); // 3
        $kregle->rzut(10); // 4
        $kregle->rzut(10); // 5
        $kregle->rzut(10); // 6
        $kregle->rzut(10); // 7
        $kregle->rzut(10); // 8
        $kregle->rzut(10); // 9
        $kregle->rzut(10); // 10
        $kregle->rzut(10); // 11
        $kregle->rzut(10); // 12  
      
        $this->assertEquals(2, $kregle->podajCzyJestDogrywka());
    }
    
    public function testZakladaZeWynikPunktacjiWyniesieDwadziescia()
    {
        $kregle = new Kregle();
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);        
      
        $this->assertEquals(20, $kregle->podajPunktacje());
    }
    
    public function testZakladaZeWynikPunktacjiWyniesieTrzydziesci()
    {
        $kregle = new Kregle();
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(10);
        $kregle->rzut(1); 
        $kregle->rzut(1);
      
        $this->assertEquals(30, $kregle->podajPunktacje());
    }
    
    public function testZakladaZeWynikPunktacjiWyniesieDwadziesciaDziewiec()
    {
        $kregle = new Kregle();
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(1);
        $kregle->rzut(9);
        $kregle->rzut(1); 
        $kregle->rzut(1);
      
        $this->assertEquals(29, $kregle->podajPunktacje());
    }
}