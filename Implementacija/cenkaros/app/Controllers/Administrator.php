<?php namespace App\Controllers;

use App\Models\RadnjaModel;
use App\Models\KorisnikModel;
use App\Models\ArtikalModel;
use App\Models\SadrziModel;
use App\Models\ProdajeModel;

class Administrator extends BazniKontroler
{
    
    //Pomocna funkcija koja postavlja controller u data i onda prikazuje 
    //header, trazenu stranicu i footer sa data nizom prosledjenim
    protected function show($page, $data=[])
    {
        $data['controller']='Administrator';
        echo view("templates\\header_logged_in",$data);
        echo view("pages\\$page",$data);
        echo view("templates\\footer",$data);
    }
    
    //Poziva prikaz glavne stranice administratora
    public function index()
    {
        $this->show('main_admin',[]);
    }
    
    //Dohvata sve artikle i poziva prikaz forme za dodavanje artikala sa njima
    public function dodajArtikal()
    {
        $am = new ArtikalModel();
        $artikli = $am->findAll();
        $this->show('dodavanje_artikla_u_sistem',["artikli"=>$artikli]);
    }
    
    //Dohvata sve artikle i poziva prikaz forme za uklanjanje artikala sa njima
    public function ukloniArtikal()
    {
        $am = new ArtikalModel();
        $artikli = $am->findAll();
        $this->show('uklanjanje_artikla_iz_sistema',["artikli"=>$artikli]);
    }
    
    //Funkcija za dodavanje artikala u sistem
    //Dohvata podatke iz polja naziv, jedinica mere i tagovi i u bazu unosi
    //novi artikal sa tim vrednostima i vraca se na metod dodajArtikal
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
    
    //Funkcija za uklanjanje artikala u sistem
    //Pronalazi idProdaje svih prodaja koje referenciraju idA i brise ih.
    //Pronalazi idSadrzi svih sadrzi koje referenciraju idA i brise ih.
    //Brise artikal sa zadatim idA i vraca se na metod ukloniArtikal
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
    
    //Pronalazi sve korisnike koji imaju tip korisnika 3(nepirhvacen predstavnik
    //Pronalazi sve radnje koje pripadaju gorenavedenim korisnicima.
    //Poziva prikaz forme za obradu zahteva sa listama radnji i korisnika.
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
    
    //Funkcija koja obradjuje zahtev
    //Dohvata da li je pozvano prihvati ili odbij i stavlja u pr. Ukoliko je poz
    //vano prihvati onda samo promeni tip korisnika sa 3 na 1. U suprotnom dohva
    //ti radnju tog korisnika i obrise je, pa onda obrise tog korisnika.
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
    
    //Poziva prikaz stranice o_nama
    public function o_nama()
    {
        $this->show('o_nama',[]);
    }
    
    //Poziva prikaz stranice kontakt
    public function kontakt()
    {
        $this->show('kontakt',[]);
    }
    
}