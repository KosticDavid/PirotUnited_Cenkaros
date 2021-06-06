<?php

namespace App\Controllers;

use App\Models\KorisnikModel;
use App\Models\RadnjaModel;
use App\Models\ProdajeModel;
use App\Models\ArtikalModel;

class Predstavnik extends BazniKontroler
{
    
    //Pomocna funkcija koja postavlja controller u data i onda prikazuje 
    //header, trazenu stranicu i footer sa data nizom prosledjenim
    protected function show($page, $data=[])
    {
        $data['controller']='Predstavnik';
        echo view("templates\\header_logged_in",$data);
        echo view("pages\\$page",$data);
        echo view("templates\\footer",$data);
    }
    
    //Poziva prikaz glavne stranice predstavnika
    public function index()
    {
        $this->show('main_predstavnik',[]);
    }
    
    //Poziva prikaz stranice za izmenu radnje
    public function izmeni_radnju()
    {
        $idK = $this->session->get("idK");
        $rm = new RadnjaModel();
        $pm = new ProdajeModel();
        $am = new ArtikalModel();
        $radnja = $rm->pretraga_idK($idK);
        if($radnja!=NULL)$prodaje = $pm->pretraga_idR($radnja[0]->idRadnje);
        else $prodaje = [];
        $artikli = [];
        $idA = [-1];
        foreach($prodaje as $p) {
            $artikli[] = $am->find($p->idArtikla);
            $idA[] = $p->idArtikla;
        }
        $ne_prodajemo = $am->pretraga_idA($idA);
        $data = ["artikli"=>$artikli,"prodaje"=>$prodaje, "ne_prodajemo"=>$ne_prodajemo];
        $this->show('radnja_dodavanje_ukljanjanje_promena',$data);
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
    
    public function odjavi_se()
    {
        $this->session->destroy();
        return redirect()->to(site_url("Gost/index/"));
    }
    
    //Funkcija za uklanjanje radnje
    //Dohvati se idK iz sesijske promenljive. Na osnovu toga se dohvati radnja
    //koja pripada tom korisniku. Na osnovu toga se dohvate i obrisu sve prodaje
    //koje referenciraju tu radnju. Onda se obrise sama radnja. Onda se obrise i
    //sam korisnik. Posle se predje na stranicu za prijavu u kontroleru Gost.
    public function ukloni_radnju()
    {
        $km = new KorisnikModel();
        $rm = new RadnjaModel();
        $pm = new ProdajeModel();
        $idK = $this->session->get("idK");
        $idR = $rm->pretraga_idK($idK)[0]->idRadnje;
        $prodaje = $pm->pretraga_idR($idR);
        foreach ($prodaje as $p) { $pm->delete($p->idProdaje); }
        $rm->delete($idR);
        $km->delete($idK);
        return redirect()->to("/Gost/index");
    }
    
    public function dodaj_artikal()
    {
        $idK = $this->session->get("idK");
        $idA = $this->request->getVar('idA');
        $rm = new RadnjaModel();
        $pm = new ProdajeModel();
        $radnja = $rm->pretraga_idK($idK);
        $pm->insert(["idArtikla"=>$idA,"idRadnje"=>$radnja[0]->idRadnje,"cena"=>0]);
        return redirect()->to(site_url("/Predstavnik/izmeni_radnju"));
    }
    
    public function ukloni_artikal($idA)
    {
        
        $rm = new RadnjaModel();
        $pm = new ProdajeModel();
        $radnja = $rm->pretraga_idK($this->session->get("idK"));
        $prodaje = $pm->pretraga_idA_idR($idA,$radnja[0]->idRadnje);
        $pm->delete($prodaje[0]->idProdaje);
        return redirect()->to(site_url("/Predstavnik/izmeni_radnju"));
    }
    
    public function promeni_cenu_artikla($idA)
    {
        $rm = new RadnjaModel();
        $pm = new ProdajeModel();
        $radnja = $rm->pretraga_idK($this->session->get("idK"));
        $prodaje = $pm->pretraga_idA_idR($idA,$radnja[0]->idRadnje);
        $pm->update($prodaje[0]->idProdaje,[ 'cena' => $this->request->getVar('cena') ]);
        return redirect()->to(site_url("/Predstavnik/izmeni_radnju"));
    }
    
}