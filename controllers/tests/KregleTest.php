<?php
include "./Kregle.php";

use PHPUnit\Framework\TestCase;

class KregleTest extends TestCase {
    private $kregle;
    
    public function setUp() 
    {
        $this->kregle = new Kregle();
    }
    
    public function powtarzajRzut($iloscRzutow, $rzut) 
    {
        for ($i = 0; $i < $iloscRzutow; $i++){
            $this->kregle->rzut($rzut);
        }
    }
    
    public function rzucStrike()
    {
        $this->kregle->rzut(10);
    }
    
    public function rzucSpare() 
    {    
        $this->kregle->rzut(5);
        $this->kregle->rzut(5);
    }
    
    public function testZakladaZeBedzieWyrzucanaWartoscZero()
    {
        $this->powtarzajRzut(20, 0);
        $this->assertEquals(0, $this->kregle->podajPunktacje());
    }   
    
    public function testZakladajacZeGraszWKregle_CzyMozeszRozegracMaksymalnieDziesiecTur()
    {
        $this->powtarzajRzut(20, 0);

        $this->assertEquals(10, $this->kregle->podajRozegraneTury());
    }
 
    public function testZakladaZeRzucaszOsiemRazyDziesiatke_JestesNaOsmejTurze()
    {
        $this->powtarzajRzut(8, 10);

        $this->assertEquals(8, $this->kregle->podajRozegraneTury());
    }

    public function testZakladaZePierwszyRzutJestMniejszyOdDziesieciu_RzucaszDrugiRazWTejSamejTurze()
    {
        $this->powtarzajRzut(2, 4);

        $this->assertEquals(1, $this->kregle->podajRozegraneTury());
    }

    public function testZakladaZeRzucamyczteryNormalneRzutyIJednegoStraika_NaliczyTrzyTury()
    {
        $this->powtarzajRzut(4, 0);
        $this->rzucStrike();
        $this->assertEquals(3, $this->kregle->podajRozegraneTury());
    }
   
    public function testZakladaZeWypadaStrike_PrzechodziDoNastepnejTury()
    {
        $this->rzucStrike();

        $this->assertEquals(1, $this->kregle->podajRozegraneTury());
    }

    public function testZakladaZeWynikRzutyJestMniejszyNizDziesiec_NiePrzechodziDoNastepnejTury()
    {
        $this->powtarzajRzut(1, 0);

        $this->assertEquals(0, $this->kregle->podajRozegraneTury());
    }

    public function testZakladaZe_WynikiDwochRzutowZostanaZwrocone()
    {
        $this->powtarzajRzut(1, 3);
        $this->powtarzajRzut(1, 5);
              
        $this->assertEquals([3, 5], $this->kregle->podajWynikiRzutow());
    }
    
    public function testZakladaZeZostanieZwroconaTablicaZWynikamiSamychStrikowCoRunde()
    {
        $this->powtarzajRzut(12, 10);          
      
        $this->assertEquals([30, 30, 30, 30, 30, 30, 30, 30, 30, 30], $this->kregle->podajPunktacjeZKazdejRundy());
    }
    
    public function testZakladaZeZostanieZwroconaTablicaZWynikamiSamychSparowCoRunde()
    {
        $this->powtarzajRzut(21, 5);
        
      
        $this->assertEquals([15, 15, 15, 15, 15, 15, 15, 15, 15, 15], $this->kregle->podajPunktacjeZKazdejRundy());
    }
    
    public function testZakladaZeWynikSamychSparowToStoPiedziesiat()
    {
        $this->powtarzajRzut(21, 5);  
      
        $this->assertEquals(150, $this->kregle->podajPunktacje());
    }
    
    public function testZakladaSuperStrike()
    {
        $this->powtarzajRzut(12, 10);          
      
        $this->assertEquals(300, $this->kregle->podajPunktacje());
    }
        
    public function testZakladaWyrzucenieSpare()
    {
        $this->rzucSpare();
        $this->powtarzajRzut(1, 3); 
        $this->powtarzajRzut(17, 0);
      
        $this->assertEquals(16, $this->kregle->podajPunktacje());
    }
    
    public function testZakladaWyrzucenieSamychDwojek()
    {
        $this->powtarzajRzut(20, 2); 
      
        $this->assertEquals(40, $this->kregle->podajPunktacje());
    }
    
    public function testZaklada_ZeNieBedzieDodatkowychRzutowPoDziesiatejRundzie()
    {
        $this->powtarzajRzut(9, 10);
        $this->powtarzajRzut(2, 3); 
      
        $this->assertEquals(0, $this->kregle->podajCzyJestDogrywka());
    }
    
    public function testZakladaZeBedzieJedenDodatkowyRzut()
    {
        $this->powtarzajRzut(18, 0);
        $this->rzucSpare();
        $this->kregle->rzut(3);
      
        $this->assertEquals(false, $this->kregle->podajCzyJestDogrywka());
    }
    
    public function testZakladaZeNieWykonanoWszystkichDodatkowychRzutow()
    {
        $this->powtarzajRzut(18, 0);
        $this->rzucStrike();
        $this->kregle->rzut(3);        
      
        $this->assertEquals(true, $this->kregle->podajCzyJestDogrywka());
    }
    
    public function testZakladaZeWynikPunktacjiWyniesieDwadziescia()
    {
        $this->powtarzajRzut(20, 1);        
      
        $this->assertEquals(20, $this->kregle->podajPunktacje());
    }
    
    public function testZakladaZeJestDrugiRzut()
    {
        $this->powtarzajRzut(3, 1);        
      
        $this->assertEquals(true, $this->kregle->podajCzyJestDrugiRzut());
    }
    
    public function testZakladaZeNieMaDrugiegoRzutu()
    {
        $this->powtarzajRzut(2, 1); 
        $this->rzucStrike();
      
        $this->assertEquals(false, $this->kregle->podajCzyJestDrugiRzut());
    }
    
    public function testZakladaZeWynikPunktacjiWyniesieTrzydziesciOsiem()
    {
        $this->powtarzajRzut(18, 1);
        $this->rzucStrike();
        $this->rzucSpare();
      
        $this->assertEquals(38, $this->kregle->podajPunktacje());
    }
}