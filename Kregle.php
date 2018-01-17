<?php
class Kregle {
    public $punkty = 0;
    private $wynikAktualnegoRzutu = 0;
    private $numerTury = 0;
    private $drugiRzut = false;
    private $wynikiWszystkichRzutow = []; 
    public $wynikKazdejTury = [];

    public function rzut($liczbaZbitychKregli)
    {
        $this->wynikAktualnegoRzutu = $liczbaZbitychKregli;      
        if($liczbaZbitychKregli == 10){
            $this->przejdzDoKolejnejTury();
            
        } else {
            $this->przeliczRzuty();
        }
        $this->pobierzWynikRzutow();       
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
    
    function pobierzWynikRzutow()
    {
        $this->wynikiWszystkichRzutow[] = $this->wynikAktualnegoRzutu;
    }
    
    function podajWynikiRzutow()
    {
        return $this->wynikiWszystkichRzutow;
    }
//  Kod do refaktoringu - padam.  
    public function obliczPunktacje()
    {
        $this->punkty = 0;
        $numerRzutu = 0;
        for ($i = 0; $i < 10; $i++) {
            if ($this->wynikiWszystkichRzutow[$numerRzutu] == 10) {
                $this->wynikKazdejTury[$i] = $this->wynikiWszystkichRzutow[$numerRzutu] + $this->wynikiWszystkichRzutow[$numerRzutu + 1] + $this->wynikiWszystkichRzutow[$numerRzutu + 2];
                $this->punkty += $this->wynikKazdejTury[$i];
                $numerRzutu++;
            } elseif ($this->wynikiWszystkichRzutow[$numerRzutu] + $this->wynikiWszystkichRzutow[$numerRzutu + 1] == 10) {
                $this->wynikKazdejTury[$i] = $this->wynikiWszystkichRzutow[$numerRzutu] + $this->wynikiWszystkichRzutow[$numerRzutu + 1] + $this->wynikiWszystkichRzutow[$numerRzutu + 2];
                $this->punkty += $this->wynikKazdejTury[$i];
                $numerRzutu += 2;
            } else {
                $this->wynikKazdejTury[$i] = $this->wynikiWszystkichRzutow[$numerRzutu] + $this->wynikiWszystkichRzutow[$numerRzutu + 1];
                $this->punkty += $this->wynikKazdejTury[$i];                
                $numerRzutu += 2;
            }
        }
    }
     
    public function podajPunktacjeZKazdejRundy()
    {
        $this->obliczPunktacje();
        return $this->wynikKazdejTury;
    }
    
    public function podajPunktacje()
    {
        $this->obliczPunktacje();
        return $this->punkty;
    }
}