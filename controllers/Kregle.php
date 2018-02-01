<?php
class Kregle {
    
    public $wynikKazdejTury = [];
    public $punkty = 0;
    private $wynikAktualnegoRzutu = 0;
    public $numerTury = 0;
    public $drugiRzut = false;
    private $wynikiWszystkichRzutow = []; 
    public $zbiteKregleWOstatniejTurze = 0;
    public $dodatkowyRzut = 0;
    public $dogrywka = true;
    
    public function rzut($liczbaZbitychKregli)
    {   
        $this->sprawdzCzyJestDogrywka($liczbaZbitychKregli);
        $this->wynikAktualnegoRzutu = $liczbaZbitychKregli;      
        if($liczbaZbitychKregli == 10){
            $this->przejdzDoKolejnejTury();
            
        } else {
            $this->przeliczRzuty();
        }
        $this->ileDodatkowychRzutowZostalo();
        $this->pobierzWynikRzutow();       
    }

    public function podajRozegraneTury()
    {
        return $this->numerTury;
    }

    private function sprawdzCzyJestDogrywka($liczbaZbitychKregli)
    {
        if($this->numerTury == 9){
            if($liczbaZbitychKregli == 10){
                $this->dodatkowyRzut = 2;
            }elseif(($this->zbiteKregleWOstatniejTurze += $liczbaZbitychKregli) == 10){
                    $this->dodatkowyRzut = 1;
            }
        }
    }
 
    public function ileDodatkowychRzutowZostalo()
    {        
        if($this->numerTury == 10){
            if($this->dodatkowyRzut > 0){
                $this->dodatkowyRzut--;
                $this->dogrywka = true;
            }else{
                return $this->dogrywka = false;
            }
        }
    }
    
    public function podajCzyJestDogrywka()
    {
        return $this->dogrywka;
    }
    
    private function przejdzDoKolejnejTury()
    {
        if($this->numerTury < 10){
            $this->numerTury++;          
        }
    }

    private function przeliczRzuty()
    {
        if ($this->drugiRzut == true){
            $this->drugiRzut = false;
            $this->przejdzDoKolejnejTury();
        } else {
            $this->drugiRzut = true;
        }
    }
    
    public function podajCzyJestDrugiRzut()
    {
        return $this->drugiRzut;
    }
    
    private function pobierzWynikRzutow()
    {
        $this->wynikiWszystkichRzutow[] = $this->wynikAktualnegoRzutu;
    }
    
    public function podajWynikiRzutow()
    {
        return $this->wynikiWszystkichRzutow;
    }
    
    private function obliczPunktacje()
    {
        $this->punkty = 0;
        $numerRzutu = 0;
        for($i = 0; $i < 10; $i++){
            if($this->jestStrike($numerRzutu)){
                $this->wynikKazdejTury[$i] = $this->premiaZaStrike($numerRzutu);
                $this->punkty += $this->wynikKazdejTury[$i];
                $numerRzutu++;
            }elseif($this->jestSpare($numerRzutu)){
                $this->wynikKazdejTury[$i] = $this->premiaZaSpare($numerRzutu);
                $this->punkty += $this->wynikKazdejTury[$i];
                $numerRzutu += 2;
            }elseif($this->jestBezBonusu ($numerRzutu)){
                $this->wynikKazdejTury[$i] = $this->bezPremii($numerRzutu);
                $this->punkty += $this->wynikKazdejTury[$i];                
                $numerRzutu += 2;
            }
        }
    }
     
    private function jestStrike($numerRzutu)
    {
        return $this->wynikiWszystkichRzutow[$numerRzutu] == 10;
    }
    
    private function jestSpare($numerRzutu)
    {
        return $this->wynikiWszystkichRzutow[$numerRzutu] + $this->wynikiWszystkichRzutow[$numerRzutu + 1] == 10;
    }
    
    private function jestBezBonusu($numerRzutu)
    {
        return $this->wynikiWszystkichRzutow[$numerRzutu] + $this->wynikiWszystkichRzutow[$numerRzutu + 1] < 10;
    }
    
    private function premiaZaStrike($numerRzutu)
    {
        return 10 + $this->wynikiWszystkichRzutow[$numerRzutu + 1] + $this->wynikiWszystkichRzutow[$numerRzutu + 2];
    }
    
    private function premiaZaSpare($numerRzutu)
    {
        return 10 + $this->wynikiWszystkichRzutow[$numerRzutu + 2];
    }
    
    private function bezPremii($numerRzutu)
    {
        return $this->wynikiWszystkichRzutow[$numerRzutu] + $this->wynikiWszystkichRzutow[$numerRzutu + 1];
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