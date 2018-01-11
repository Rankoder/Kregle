<?php
class Kregle {
    private $punkty = 0;
    private $wynikAktualnegoRzutu = 0;
    private $wynikAktualnejTury = 0;
    private $numerTury = 0;
    private $drugiRzut = false;
    private $punktacjaZKazdejTury = null;
    private $aktualnaTura = 0;

    public function rzut($liczbaZbitychKregli)
    {
        $this->wynikAktualnegoRzutu = $liczbaZbitychKregli;      
        if($liczbaZbitychKregli == 10){
            $this->przejdzDoKolejnejTury();
            
        } else {
            $this->przeliczRzuty();
        }
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
    
    function podajWynikAktualnejTury()
    {   
        return $this->wynikAktualnejTury;
    }
}