<?php
class Kregle {
    private $punkty = 0;
    private $wynikAktualnegoRzutu = 0;
    private $numerTury = 0;
    private $drugiRzut = false;
    private $wynikiWszystkichRzutow = [];
    private $wynikiTur = [];  
    private $wynik = 0;
 

    public function rzut($liczbaZbitychKregli)
    {
        $this->wynikAktualnegoRzutu = $liczbaZbitychKregli;      
        if($liczbaZbitychKregli == 10){
            $this->przejdzDoKolejnejTury();
            
        } else {
            $this->przeliczRzuty();
        }
        $this->pobierzWynikRzutow();
        $this->zliczajPunkty();        
    }

    public function podajRozegraneTury()
    {
        return $this->numerTury;
    }

    private function przejdzDoKolejnejTury()
    {
        if($this->numerTury < 10) {
            $this->numerTury++;            
        }
    }

   private function przeliczRzuty()
    {
        if ($this->drugiRzut == true) {
            $this->drugiRzut = false;
            $this->przejdzDoKolejnejTury();
        } else {
            $this->drugiRzut = true;
        }
    }
    public function podajPunktacje()
    {
        return $this->punkty;
    }

    function zliczajPunkty()
    {
        $this->punkty += $this->wynikAktualnegoRzutu;
    }
    
    function pobierzWynikRzutow()
    {
        $this->wynikiWszystkichRzutow[] = $this->wynikAktualnegoRzutu;
    }
    
    function podajWynikiRzutow()
    {
        return $this->wynikiWszystkichRzutow;
    }
    
    function podajWynikiTur()
    {
        $this->zapiszWynikTury();
        return $this->wynikiTur;
    }
    
    function zapiszWynikTury()
    { 
        $wynikTury = 0;
        $drugiRzut = false;        
        foreach($this->wynikiWszystkichRzutow as $rzut=>$value){
            if($value === 10){
                $this->wynikiTur[] = "strike";
            }else{
                if($drugiRzut == false){
                    $wynikTury = $value;
                    $drugiRzut = true;
                }else{
                    $wynikTury += $value;
                    $drugiRzut = false;
                    if($wynikTury == 10){
                        $this->wynikiTur[] = "spare";                        
                    }else{
                        $this->wynikiTur[] = $wynikTury; 
                    }
                }                
            }
        }
    }
    
    function podajWynikMeczu()
    {   
        $this->obliczWynikMeczu();
        return $this->wynik;
    }
    
    function obliczWynikMeczu(){
        $this->podajWynikiTur();
        
        for($i = 0; $i < 10; $i++){       
            if($this->wynikiTur[$i] == "strike"){
                $this->wynik += 10;
                if($this->wynikiTur[$i + 1] = "stirke") {
                    $this->wynik += 10;
                }elseif($this->wynikiTur[$i + 1]  = "spare"){
                    $this->wynik += 10;
                }else{
                    $this->wynik += $this->wynikiTur[$i + 1];
                }
                if($this->wynikiTur[$i + 2] == "strike"){
                    $this->wynik += 10;
                }elseif($this->wynikiTur[$i + 2] == "spare"){
                    $this->wynik += 10;
                }else{
                    $this->wynik += $this->wynikiTur[$i + 2];
                }
            }elseif($this->wynikiTur[$i] == "spare"){
                $this->wynik += 10;
                if($this->wynikiTur[$i + 1] == "strike" || $this->wynikiTur[$i + 1] == "spare"){
                    $this->wynik += 10;
                }else{
                    $this->wynik += $this->wynikiTur[$i + 1];
                }
            }else{
                $this->wynik += $this->wynikiTur[$i];                
            }
        }
    }
 
        

}