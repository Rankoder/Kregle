<?php
class Kregle {
    private $punkty = 0;
    private $wynikAktualnegoRzutu = 0;
    private $numerTury = 0;
    private $drugiRzut = false;
    private $wynikiWszystkichRzutow = []; 
    private $wynikiZWszystkichTur = [];
    private $aktualnaTura = true;
    private $sumaZbitychKregliWJednejTurze = 0;
    private $wynikiTekstoweTur = [];  

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
    
    function zliczIloscKregliZbitychWKazdejTurze()
    {   
        foreach($this->wynikiWszystkichRzutow as $rzut){
            if($rzut < 10){
                $this->zliczajPunktyZbitychKregliZJednejTuryZDwochRund($rzut);
            }else{
                $this->wynikiZWszystkichTur[] = $rzut;
                $this->wynikiTekstoweTur[] = "strike";
            }
        }
    }
    
    function sprawdzCzyWynikTuryToSpare()
    {
        if($this->sumaZbitychKregliWJednejTurze === 10){
            $this->wynikiTekstoweTur[] = "spare";
        }else{
            $this->wynikiTekstoweTur[] = $this->sumaZbitychKregliWJednejTurze;              
        }
    }
    
    function zliczajPunktyZbitychKregliZJednejTuryZDwochRund($rzut)
    {
        if($this->aktualnaTura === true){
            $this->sumaZbitychKregliWJednejTurze = $rzut;
            $this->aktualnaTura = false;
        }else{
            $this->sumaZbitychKregliWJednejTurze += $rzut;
            $this->aktualnaTura = true;
            $this->wynikiZWszystkichTur[] = $this->sumaZbitychKregliWJednejTurze;
            $this->sprawdzCzyWynikTuryToSpare();
        }
    }
    
    function podajLiczbeZbitychKregliKazdejTury()
    {  
        $this->zliczIloscKregliZbitychWKazdejTurze();
        return $this->wynikiZWszystkichTur;   
    }
    
    function podajTekstoweWynikiTur()
    {
        $this->zliczIloscKregliZbitychWKazdejTurze();
        return $this->wynikiTekstoweTur;   
    }
    
    public $punktacjaKazdejTury = [];
    
    function obliczPunktacjeKazdejTury()
    {
        $this->podajTekstoweWynikiTur();
        foreach($this->wynikiTekstoweTur as $key=>$value){
            $end = $key;
        }
        for($i = 0; $i < $key; $i++){
            if($this->wynikiTekstoweTur[$i] == "strike"){
                $this->punktacjaKazdejTury[] = $this->wynikiZWszystkichTur[$i] + $this->wynikiZWszystkichTur[$i + 1] + $this->wynikiZWszystkichTur[$i + 2] ;
            }
        }
    }    
    
    function podajPunktacjeKazdejTury()
    {   
        $this->obliczPunktacjeKazdejTury();
        return $this->punktacjaKazdejTury;
    }
}