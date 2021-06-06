<?php namespace App\Controllers;

use App\Models\RadnjaModel;
use App\Models\KorisnikModel;
use App\Models\ArtikalModel;
use App\Models\SadrziModel;
use App\Models\ProdajeModel;

/**
 * Klasa koja predstavlja kontroler za administratora
 * @author Milan Akik 2018/0688
 * @author David Kostic 2016/0624
 * 
 * @version 1.0
 */
class Administrator extends BazniKontroler
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
        $data['controller']='Administrator';
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
        $this->show('main_admin',[]);
    }
    
    /**
    * Prikaz stranice za dodavanje artikla u sistem sa listom svih artikala
    *
    * @return void
    *
    */
    public function dodajArtikal()
    {
        $am = new ArtikalModel();
        $artikli = $am->findAll();
        $this->show('dodavanje_artikla_u_sistem',["artikli"=>$artikli]);
    }
    
    /**
    * Prikaz stranice za uklanjanje artikla iz sistema sa listom svih artikala
    *
    * @return void
    *
    */
    public function ukloniArtikal()
    {
        $am = new ArtikalModel();
        $artikli = $am->findAll();
        $this->show('uklanjanje_artikla_iz_sistema',["artikli"=>$artikli]);
    }
    
    /**
    * Obrada dodavanja artikala u sistem
    *
    * @return void
    *
    */
    public function dodajA()
    {
        $am = new ArtikalModel();
        $naziv = $this->request->getVar('naziv');
        $jm = $this->request->getVar('jm');
        $tags = $this->request->getVar('tags');
        $am->insert([
            "naziv"=>$naziv,
            "jedinicaMere"=>$jm,
            "tags"=>$tags
        ]);
        return redirect()->to(site_url("Administrator/dodajArtikal"));
    }
    
    /**
    * Obrada uklanjanja artikala iz sistema
    *
    * @return void
    *
    */
    public function ukloniA($idA)
    {
        $am = new ArtikalModel();
        $pm = new ProdajeModel();
        $sm = new SadrziModel();
        $pro = $pm->pretraga_idA($idA);
        $sad = $sm->pretraga_idA($idA);
        foreach ($pro as $p)
        {
            $pm->delete($p->idProdaje);
        }
        foreach ($sad as $s)
        {
            $sm->delete($s->idSadrzi);
        }
        $am->delete($idA);
        return redirect()->to(site_url("Administrator/ukloniArtikal"));
    }
    
    /**
    * Prikazuje stranicu za obradu zahteva kojoj se prosledjuju svi neobnradjeni
    * predstavnici radnji
    *
    * @return void
    *
    */
    public function obradiZahteve()
    {
        $rm = new RadnjaModel();
        $km = new KorisnikModel();
        $kor = $km->pretrazi_tip(3);
        $r = [];
        $k = [];
        foreach ($kor as $ko)
        {
            $k[] = $ko;
            $r[] = $rm->pretraga_idK($ko->idKorisnik)[0];
        }
        $this->show('prihvatanje_odbijanje_zahteva_za_registraciju_predstavnik',["radnje"=>$r,"predstavnici"=>$k]);
    }
    
    /**
    * Obrada pristiglih zahteva za registraciju predstavnika radnje
    *
    * @return void
    *
    */
    public function prihvatiodbij($idK)
    {
        $pr = $this->request->getVar('prihvati');
        $data = ['tipKorisnika'=>1];
        $km = new KorisnikModel();
        $rm = new RadnjaModel();
        if($pr!=NULL)
        {
            $km->update($idK, $data);
        }
        else
        {
            $idR = $rm->pretraga_idK($idK)[0]->idRadnje;
            $rm->delete($idR);
            $km->delete($idK);
        }
        return redirect()->to("/Administrator/obradiZahteve");
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
    
}