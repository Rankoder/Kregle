public function testZakladaZe_WynikiCzterechRzutowZostanaZwroconeJakoWynikDwochTur()
    {        
        $kregle = new Kregle();
        $kregle->rzut(3);
        $kregle->rzut(5);
        $kregle->rzut(3);
        $kregle->rzut(5);
            
        $this->assertEquals([8, 8], $kregle->podajPunktacjeWszystkichTur());
    }
    
    public function testZakladaZe_WynikdrugiejTuryToBedzieStrike()
    {        
        $kregle = new Kregle();
        $kregle->rzut(3);
        $kregle->rzut(5);
        $kregle->rzut(10);
             
        $this->assertEquals([8, 'strike'], $kregle->podajPunktacjeWszystkichTur());
    }
    
//    public function testZakladaZe_WyniktrzeciejTuryToBedzieSpare()
//    {        
//        $kregle = new Kregle();
//        $kregle->rzut(3);
//        $kregle->rzut(5);
//        $kregle->rzut(10);
//        $kregle->rzut(4);
//        $kregle->rzut(6);
//   
//        $this->assertEquals([8, 'strike', 'spare'], $kregle->podajWynikiTur());
//    }
    
//    public function testZakladaZe_PoWyrzuceniuStrikeOtrzymamydziesiecPunktowPlusPunktyZdwochKolejnychTur()
//    {        
//        $kregle = new Kregle();
//        $kregle->rzut(10);
//        $kregle->rzut(3);
//        $kregle->rzut(2);
//        $kregle->rzut(5);
//        $kregle->rzut(2);
//             
//        
//        $this->assertEquals(22, $kregle->podajWynikMeczu());
//    }
    
//    public function testZakladaZe_PoWyrzuceniuDwochStirkeowPodRzadOtrzymamyPiedziesiatDwaPunkty()
//    {        
//        $kregle = new Kregle();
//        $kregle->rzut(10);
//        $kregle->rzut(10);
//        $kregle->rzut(5);
//        $kregle->rzut(2);
//        $kregle->rzut(1);
//        $kregle->rzut(1);
//             
//        
//        $this->assertEquals(52, $kregle->podajWynikMeczu());
//    }
}







function podajPunktacjeWszystkichTur()
    {
        $this->zamienWynikRzutowNaWynikTur();
        return $this->wynikiTur;
    }
    
    function zamienWynikRzutowNaWynikTur()
    { 
        
        $wynikTury = 0;
        $drugiRzut = false;        
        foreach($this->wynikiWszystkichRzutow as $rzut=>$value){
            zapiszWynikTuryJakoStrike($value);
//            }else{
//                if($drugiRzut == false){
//                    $wynikTury = $value;
//                    $drugiRzut = true;
//                }else{
//                    $wynikTury += $value;
//                    $drugiRzut = false;
//                    if($wynikTury == 10){
//                        $this->wynikiTur[] = "spare";                        
//                    }else{
//                        $this->wynikiTur[] = $wynikTury; 
//                    }
//                }                
//            }
//        }
    }
    
    function zapiszWynikTuryJakoStrike($value)
    {
        if($value === 10){
                $this->wynikiTur[] = "strike";
        }
    }
    
    
//    function podajWynikMeczu()
//    {   
//        $this->obliczWynikMeczu();
//        return $this->wynik;
//    }
    
//    function obliczWynikMeczu(){
//        $this->podajWynikiTur();
//        
//        for($i = 0; $i < 10; $i++){       
//            if($this->wynikiTur[$i] == "strike"){
//                $this->wynik += 10;
//                if($this->wynikiTur[$i + 1] = "stirke") {
//                    $this->wynik += 10;
//                }elseif($this->wynikiTur[$i + 1]  = "spare"){
//                    $this->wynik += 10;
//                }else{
//                    $this->wynik += $this->wynikiTur[$i + 1];
//                }
//                if($this->wynikiTur[$i + 2] == "strike"){
//                    $this->wynik += 10;
//                }elseif($this->wynikiTur[$i + 2] == "spare"){
//                    $this->wynik += 10;
//                }else{
//                    $this->wynik += $this->wynikiTur[$i + 2];
//                }
//            }elseif($this->wynikiTur[$i] == "spare"){
//                $this->wynik += 10;
//                if($this->wynikiTur[$i + 1] == "strike" || $this->wynikiTur[$i + 1] == "spare"){
//                    $this->wynik += 10;
//                }else{
//                    $this->wynik += $this->wynikiTur[$i + 1];
//                }
//            }else{
//                $this->wynik += $this->wynikiTur[$i];                
//            }
//        }
//    }

