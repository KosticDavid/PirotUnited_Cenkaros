<?php

namespace App\Controllers;
use App\Models\ListaModel;
use App\Models\SadrziModel;
use App\Models\ArtikalModel;
use App\Models\RadnjaModel;
use App\Models\ProdajeModel;

/**
 * Klasa koja predstavlja kontroler za kupca
 * @author Milena Djuric 2018/0630
 * @author Milan Akik 2018/0688
 * 
 * @version 1.0
 */
class Kupac extends BazniKontroler
{
    
    /**
    * Prikaz prosledjene stranice
    *
    * @param string $page stranica
    * @param array $data podaci
    *
    * @return void
    *
    */
    protected function show($page, $data=[])
    {
        $data['controller']='Kupac';
        echo view("templates\\header_logged_in",$data);
        echo view("pages\\$page",$data);
        echo view("templates\\footer",$data);
    }
    
    /**
    * Prikaz indeksne stranice
    *
    * @return void
    *
    */
    public function index()
    {
        $this->session->remove("idL");
        $this->session->remove("lista");
        $this->show('main_kupac',[]);
    }
    
    /**
    * Prikaz stranice o nama
    *
    * @return void
    *
    */
    public function o_nama()
    {
        $this->show('o_nama',[]);
    }
    
    /**
    * Prikaz stranice kontakt
    *
    * @return void
    *
    */
    public function kontakt()
    {
        $this->show('kontakt',[]);
    }
    
    /**
    * Prikaz stranice za cuvanje liste
    *
    * @return void
    *
    */
    public function cuvanje_liste()
    {
        $this->show('cuvanje_liste',[]);
    }
    
    /**
    * Prikaz stranice za izbor maksimalne razdaljine radnje
    *
    * @return void
    *
    */
    public function maksimalna_razdaljina()
    {
        $this->show('maksimalna_razdaljina',[]);
    }
    
    /**
    * Prikaz stranice za ispis prikladnih radnji za listu
    * prosledjuju se svi potrebni podaci za ispis
    *
    * @return void
    *
    */
    public function ispis(){
        $nazivi = [];
        $lokacije_duzine=[];
        $lokacije_sirine=[];
        $radno_vreme = [];
        $radni_dani = [];
        
        $sve_radnje = $this->session->get("r");
        $cene = $this->session->get("c");
        $this->session->remove("r");
        $this->session->remove("c");
        
        foreach ($sve_radnje as $sr){
            $nazivi[] = $sr->naziv;
            $lokacije_duzine[] = $sr->duzina;
            $lokacije_sirine[] = $sr->sirina;
            $radno_vreme[] = $sr->radnoVreme;
            $radni_dani[] = $sr->radniDani;
        }
        $data = ["nazivi" => $nazivi, "cene"=>$cene, "duzine"=>$lokacije_duzine, "sirine"=>$lokacije_sirine, "radno_vreme"=>$radno_vreme, "radni_dani"=>$radni_dani];
        
        $this->show('ispis',$data);
    }
    
    /**
    * Obrada fajla i dodavanje artikala na listu automatski
    *
    * @return void
    *
    */
    public function dodaj_automatski()
    {
        
        $file = $this->request->getFile('list');
        $csv = $file->openFile('r');
        $lis = $this->session->get("lista");
        $liste = explode(";",$lis);
        $ids = [];
        $kol = [];
        foreach ($liste as $l)
        {
            if($l=="")break;
            $ll = explode(",", $l);
            $ids[] = $ll[0];
            $kol[] = $ll[1];
        }
        foreach ($csv as $row)
        {
            $a = explode(",", $row);
            $flag = true;
            for($i=0; $i<count($ids); $i++)
            {
                if($ids[$i]==$a[0])
                {
                    $kol[$i] = intval($kol[$i]) + intval($a[1]);
                    $flag = false;
                    break;
                }
            }
            if($flag)
            {
                $ids[] = $a[0];
                $kol[] = $a[1];
            }
        }
        $res = "";
        for($i=0; $i<count($ids); $i++)
        {
            $res = $res.$ids[$i].",".$kol[$i].";";
        }
        $this->session->set("lista",$res);
        return redirect()->to(site_url("Kupac/pregledaj_listu/"));
        
    }
    
    /**
    * Biranje radnji koje prolaze kroz sve filtere
    *
    * @return void
    *
    */
    public function biranje_radnje(){
        $radnja = new RadnjaModel();
        $prodaje = new ProdajeModel();
        $sve_radnje = $radnja->findAll();
        $nasa_sirina= $this->deg2rad(44.80552851014836);
        $nasa_duzina= $this->deg2rad(20.47620173888814);
        $razdaljina = $this->request->getVar("max_razdaljina");
        $u_opsegu = [];
        
        foreach ($sve_radnje as $sr){
            $njihova_sirina = $this->deg2rad($sr->sirina);
            $njihova_duzina = $this->deg2rad($sr->duzina);
            $delta_fi = $njihova_sirina - $nasa_sirina;
            $delta_lambda = $njihova_duzina - $nasa_duzina;
            $fi_m = ($nasa_sirina + $njihova_sirina)/2;
            $r = 6371009;
            $d = $r*sqrt(pow($delta_fi, 2)+pow((cos($fi_m)* $delta_lambda),2));
            if($d < $razdaljina){
                $u_opsegu[] = $sr;
            
            }
        }
        $l = explode(";",$this->session->get("lista"));
        $odgovarajuce_radnje =[];
        $cene_artikala = [];
        
        foreach ($u_opsegu as $op){
            $flag = true; 
            $cena_ukupna = 0;
            foreach($l as $artikal){
                if($artikal == '') break;
                $a = explode(",", $artikal);
                
                $p = $prodaje->pretraga_idA_idR($a[0], $op->idRadnje);
                if ($p == NULL){
                    $flag = false;
                    break;
                }
                if ($p[0]->cena == 0){
                    $flag = false;
                    break;                    
                }    
                $cena_ukupna += $p[0]->cena * $a[1];
            }
            if($flag){
                $odgovarajuce_radnje[] = $op;
                $cene_artikala[] = $cena_ukupna;
            }

        }
        
        for($i = 0; $i < count($odgovarajuce_radnje) -1 ; $i++){
            for($j = $i+1; $j < count($odgovarajuce_radnje) ;$j++){
                if($cene_artikala[$j] < $cene_artikala[$i]){
                    $t = $cene_artikala[$j];
                    $cene_artikala[$j] = $cene_artikala[$i];
                    $cene_artikala[$i] = $t;
                    
                    $t = $odgovarajuce_radnje[$j];
                    $odgovarajuce_radnje[$j] = $odgovarajuce_radnje[$i];
                    $odgovarajuce_radnje[$i] = $t;
                }
            }
        }
        
        $this->session->set("r",$odgovarajuce_radnje) ;
        $this->session->set("c", $cene_artikala);
        return redirect()->to(site_url("Kupac/ispis"));
//        
//        for($i = 0; $i < count($odgovarajuce_radnje); $i++){
//            echo $odgovarajuce_radnje[$i]->naziv;
//            echo '</br>';
//            echo $cene_artikala[$i];
//            echo '</br>';
//        }
        
    }

    /**
    * Pretvaranje broja iz stepena u radijane
    * 
    * @param decimal $deg stepeni
    *
    * @return decimal
    *
    */
    protected function deg2rad($deg){
        return M_PI * $deg / 180.0000;
    }

    /**
    * Prikaz stranice pregled sacuvanih listi kojoj se posalju sve nase liste
    *
    * @return void
    *
    */
    public function sacuvane_liste()
    {
        
        $this->session->remove("idL");
        $this->session->remove("lista");
        $idK = $this->session->get("idK");
        $lm = new ListaModel();
        $sm = new SadrziModel();
        $liste = $lm->pretraga_idK($idK);
        $sadrzi = $sm->findAll();
        $data = ["liste"=>$liste,"sadrzi"=>$sadrzi];
        $this->show('pregledaj_sacuvane_liste',$data);
    }
    
    /**
    * Obrada brisanja liste
    *
    * @param integer $idL idListe
    *
    * @return void
    *
    */
    public function obrisi_listu($idL)
    {
        $lm = new ListaModel();
        $sm = new SadrziModel();
        $sadrzi = $sm->pretraga_idL($idL);
        foreach($sadrzi as $s)$sm->delete($s->idSadrzi);
        $lm->delete($idL);
        return redirect()->to(site_url("/Kupac/sacuvane_liste"));
    }
    
    /**
    * Prikaz stranice za pregled liste
    *
    * @param integer $idL idListe
    *
    * @return void
    *
    */
    public function pregledaj_listu($idListe=-1)
    {
        $lista = new ListaModel();
        $sadrzi = new SadrziModel();
        $artikal = new ArtikalModel();
        $sviArtikli = $artikal->findAll();
        $nazivi = [];
        $kolicine = [];
        $artikli= [];
        if($this->session->get("lista")!=NULL)
        {
            $liste = explode(";",$this->session->get("lista"));
            foreach($liste as $l)
            {
                if($l=="")break;
                $artikli[]= explode(",", $l)[0];
                $nazivi[]=$artikal->find( explode(",", $l)[0])->naziv;
                $kolicine[]= explode(",", $l)[1];
            }
        }
        else if($idListe==-1)
        {
            $this->session->set("lista","");
            $this->session->set("idL",-1);
        }
        else
        {
            
            $l = $lista->find($idListe);
            $s = $sadrzi->pretraga_idL($idListe);
            $clanovi = "";
            foreach($s as $sadr){
                $artikli[]= $sadr->idArtikla;
                $nazivi[]=$artikal->find($sadr->idArtikla)->naziv;
                $kolicine[]= $sadr->kolicina;
                $clanovi = $clanovi.$sadr->idArtikla.",".$sadr->kolicina.";";
            }
            $this->session->set("idL",$idListe);
            $this->session->set("lista",$clanovi);
        }
        $data = [
            "sviArtikli"=>$sviArtikli,
            "nazivi" => $nazivi,
            "kolicine" => $kolicine,
            "artikli" => $artikli,
            "idL" => $this->session->get("idL")];
        $this->show('pregledaj_listu', $data);
    }
    
    /**
    * Obrada dodavanja artikla na listu
    *
    * @param integer $idA idArtikla
    *
    * @return void
    *
    */
    public function dodaj_artikal($idArtikla)
    {
        
        $lis = $this->session->get("lista");
        $liste = explode(";",$lis);
        foreach($liste as $l)
        {
            if($l=="")break;
            $idA= explode(",", $l)[0];
            if($idA==$idArtikla)
            {
                return redirect()->to(site_url("Kupac/uvecaj_artikal/{$idArtikla}"));
            }
        }
        $lis=$lis.$idArtikla.",1;";
        $this->session->set("lista",$lis);
        return redirect()->to(site_url("Kupac/pregledaj_listu/"));
    }
    
    /**
    * Uvecavanje broja elemenata na listi
    *
    * @param integer $idA idArtikla
    *
    * @return void
    *
    */
    public function uvecaj_artikal($idArtikla)
    {   
        $lis = $this->session->get("lista");
        $liste = explode(";",$lis);
        $lista = "";
        foreach($liste as $l)
        {
            if($l=="")break;
            $idA= explode(",", $l)[0];
            $kol= explode(",", $l)[1];
            $kol = $kol+1;
            if($idA!=$idArtikla)
            {
                $lista = $lista . $l.";";
            }
            else
            {
                $lista = $lista . $idA . "," . $kol . ";";
            }
            
        }
        $this->session->set("lista",$lista);
        return redirect()->to(site_url("Kupac/pregledaj_listu/"));
    }
    
    /**
    * Umanjivanje broja elemenata na listi
    *
    * @param integer $idA idArtikla
    *
    * @return void
    *
    */
    public function umanji_artikal($idArtikla)
    {
        $lis = $this->session->get("lista");
        $liste = explode(";",$lis);
        $lista = "";
        foreach($liste as $l)
        {
            if($l=="")break;
            $idA= explode(",", $l)[0];
            $kol= explode(",", $l)[1];
            if($kol == 1) $kol=$kol;
            else $kol = $kol-1;
            if($idA!=$idArtikla)
            {
                $lista = $lista . $l.";";
            }
            else
            {
                $lista = $lista . $idA . "," . $kol . ";";
            }
        }
        $this->session->set("lista",$lista);
        return redirect()->to(site_url("Kupac/pregledaj_listu/"));
    }
    
    /**
    * Uklanjanje artikla sa liste
    *
    * @param integer $idA idArtikla
    *
    * @return void
    *
    */
    public function ukloni_artikal($idArtikla)
    {
        $lis = $this->session->get("lista");
        $liste = explode(";",$lis);
        $lista = "";
        foreach($liste as $l)
        {
            if($l=="")break;
            $idA= explode(",", $l)[0];
            if($idA!=$idArtikla)
            {
                $lista = $lista . $l.";";
            }
        }
        $this->session->set("lista",$lista);
        return redirect()->to(site_url("Kupac/pregledaj_listu/"));
    }
    
    /**
    * Cuvanje liste u bazi podataka
    *
    * @return void
    *
    */
    public function sacuvaj_listu()
    {
        $naziv = $this->request->getVar("naziv");
        $idL = $this->session->get("idL");
        $idK = $this->session->get("idK");
        $lm = new ListaModel();
        $sm = new SadrziModel();
        if($idL == -1)
        {
            $data = ["naziv"=>$naziv, "idKorisnik"=>$idK];
            $idL = $lm->insert($data);
            
            $liste = explode(";",$this->session->get("lista"));
            foreach($liste as $l)
            {
                if($l=="")break;
                $idA= explode(",", $l)[0];
                $kol= explode(",", $l)[1];
                $data = ["kolicina"=>$kol, "idListe"=>$idL, "idArtikla"=>$idA];
                $sm->insert($data);
            }
            
        }
        else 
        {
            $sadrzi = $sm->pretraga_idL($idL);
            foreach ($sadrzi as $s)$sm->delete($s->idSadrzi);
            $naziv = $lm->find($idL)->naziv;
            
            $liste = explode(";",$this->session->get("lista"));
            foreach($liste as $l)
            {
                if($l=="")break;
                $idA= explode(",", $l)[0];
                $kol= explode(",", $l)[1];
                $data = ["kolicina"=>$kol, "idListe"=>$idL, "idArtikla"=>$idA];
                $sm->insert($data);
            }
        }
        $this->session->remove("idL");
        $this->session->remove("lista");
        return redirect()->to(site_url("Kupac/sacuvane_liste/"));
    }
    
    /**
    * Preuzima listu u obliku csv fajla
    *
    * @param integer $idL idListe
    *
    * @return void
    *
    */
    public function skini_listu($idL)
    {
        $sm = new SadrziModel();
        $s = $sm->pretraga_idL($idL);
        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename=example.csv');
        header('Pragma: no-cache');
        $i=0;
        for(; $i<count($s)-1; $i++)
        {
            echo "{$s[$i]->idArtikla},{$s[$i]->kolicina}\n";
        }
        echo "{$s[$i]->idArtikla},{$s[$i]->kolicina}";
        exit();
    }
    
    /**
    * Obrada odjave korisnika sa sistema
    *
    * @return void
    *
    */
    public function odjavi_se()
    {
        $this->session->destroy();
        return redirect()->to(site_url("Gost/index/"));
    }
    
    /**
    * Dohvata artikle koji imaju tagove slicne onome sto je prosledjeno u requestu
    *
    * @return void
    *
    */
    public function dohvati_artikle_kao()
    {
        $tags = $this->request->getVar("tags");
        $am = new ArtikalModel();
        $ar = $am->pretraga_tags($tags);
        foreach ($ar as $a)
        {
            echo '<div class=\'result\' onclick=\'window.location.replace("';
            echo site_url("Kupac/dodaj_artikal/{$a->idArtikla}");
            echo '")\'>';
            echo $a->naziv;
            echo "</div>";
        }
        exit();
    }
    
}