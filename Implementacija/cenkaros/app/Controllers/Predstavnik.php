<?php

namespace App\Controllers;

use App\Models\KorisnikModel;
use App\Models\RadnjaModel;
use App\Models\ProdajeModel;

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
        $this->show('radnja_dodavanje_ukljanjanje_promena',[]);
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
    
}