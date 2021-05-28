<?php

namespace App\Controllers;
use App\Models\ListaModel;
use App\Models\SadrziModel;

class Kupac extends BazniKontroler
{
    
    //Pomocna funkcija koja postavlja controller u data i onda prikazuje 
    //header, trazenu stranicu i footer sa data nizom prosledjenim
    protected function show($page, $data=[])
    {
        $data['controller']='Kupac';
        echo view("templates\\header_logged_in",$data);
        echo view("pages\\$page",$data);
        echo view("templates\\footer",$data);
    }
    
    //Poziva prikaz glavne stranice kupca
    public function index()
    {
        $this->show('main_kupac',[]);
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
    
    //Poziva prikaz stranice nova_lista
    public function nova_lista()
    {
        $this->show('nova_lista',[]);
    }
    
    //Funkcija za prikaz sacuvanih lista
    //Dohvate se sve liste koje pripadaju korisniku sa idKorisnika idK
    //Dohvate se svi sadrzi. Onda se prebaci na prikaz sacuvanih lista sa njima.
    public function sacuvane_liste()
    {
        $idK = $this->session->get("idK");
        $lm = new ListaModel();
        $sm = new SadrziModel();
        $liste = $lm->pretraga_idK($idK);
        $sadrzi = $sm->findAll();
        $data = ["liste"=>$liste,"sadrzi"=>$sadrzi];
        $this->show('pregledaj_sacuvane_liste',$data);
    }
    
    //Funkcija za brisanje liste
    //Dohvate se svi sadrzi koji su u toj listi i obrisu. Onda se obrise lista.
    //Onda se prebaci na prikaz sacuvanih lista.
    public function obrisi_listu($idL)
    {
        $lm = new ListaModel();
        $sm = new SadrziModel();
        $sadrzi = $sm->pretraga_idL($idL);
        foreach($sadrzi as $s)$sm->delete($s->idSadrzi);
        $lm->delete($idL);
        return redirect()->to(site_url("/Kupac/sacuvane_liste"));
    }
    
}