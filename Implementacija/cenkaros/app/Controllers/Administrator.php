<?php namespace App\Controllers;

use App\Models\RadnjaModel;
use App\Models\KorisnikModel;
use App\Models\ArtikalModel;
use App\Models\SadrziModel;
use App\Models\ProdajeModel;

class Administrator extends BazniKontroler
{
    
    protected function show($page, $data=[])
    {
        $data['controller']='Administrator';
        echo view("templates\\header_logged_in",$data);
        echo view("pages\\$page",$data);
        echo view("templates\\footer",$data);
    }
    
    public function index()
    {
        $this->show('main_admin',[]);
    }
    
    public function dodajArtikal()
    {
        $am = new ArtikalModel();
        $artikli = $am->findAll();
        $this->show('dodavanje_artikla_u_sistem',["artikli"=>$artikli]);
    }
    
    public function ukloniArtikal()
    {
        $am = new ArtikalModel();
        $artikli = $am->findAll();
        $this->show('uklanjanje_artikla_iz_sistema',["artikli"=>$artikli]);
    }
    
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
    
    public function o_nama()
    {
        $this->show('o_nama',[]);
    }
    
    public function kontakt()
    {
        $this->show('kontakt',[]);
    }
    
}