<?php
class Kregle {
    
    public $wynikKazdejTury = [];
    public $punkty = 0;
    private $wynikAktualnegoRzutu = 0;
    private $numerTury = 0;
    private $drugiRzut = false;
    private $wynikiWszystkichRzutow = []; 
    public $zbiteKregleWOstatniejTurze = 0;
    public $dogrywka = 0;
    
    public function rzut($liczbaZbitychKregli)
    {   
        $this->sprawdzCzyJestDogrywka($liczbaZbitychKregli);
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

    function sprawdzCzyJestDogrywka($liczbaZbitychKregli){
        if($this->numerTury == 9){
            if($liczbaZbitychKregli == 10){
                $this->dogrywka = 2;
            }else{
                $this->zbiteKregleWOstatniejTurze += $liczbaZbitychKregli;
            if($this->zbiteKregleWOstatniejTurze == 10){
                $this->dogrywka = 1;
            }else{
                $this->dogrywka = 0;
            }
            }
        }
    }
 
    public function podajCzyJestDogrywka(){
        return $this->dogrywka;
    }
    
    private function przejdzDoKolejnejTury()
    {
        if($this->numerTury < 10){
            $this->numerTury++;            
        }
    }
//elseif($this->dogrywka > 0){
//            $this->dogrywka--;
//        }else{
//            return $this->podajPunktacje();
//        }
    private function przeliczRzuty()
    {
        if ($this->drugiRzut == true){
            $this->drugiRzut = false;
            $this->przejdzDoKolejnejTury();
        } else {
            $this->drugiRzut = true;
        }
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
            }else{
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