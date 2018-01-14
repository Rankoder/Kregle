<?php
class Kregle {
    private $punkty = 0;
    private $wynikAktualnegoRzutu = 0;
    private $numerTury = 0;
    private $drugiRzut = false;
    private $wynikiWszystkichRzutow = []; 
    private $wynikiWszystkichTur = [];

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
                $this->zliczajPunktyZbitychKregliZJednejTury($rzut);
            }
        }
    }
    
    function zliczajPunktyZbitychKregliZJednejTury($rzut)
    {
        $aktualnaTura = true;
        if($aktualnaTura === true){
            $sumaZbitychKregliWJednejTurze = $rzut;
            $aktualnaTura = false;
        }else{
            $sumaZbitychKregliWJednejTurze += $rzut;
            $aktualnaTura = true;
            $this->wynikiWszystkichTur[] = $sumaZbitychKregliWJednejTurze;
        }
    }
    
    function podajWynikiTur()
    {  
        return $this->wynikiWszystkichTur;        
    }
    
}