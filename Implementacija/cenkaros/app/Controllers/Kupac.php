<?php

namespace App\Controllers;
use App\Models\ListaModel;
use App\Models\SadrziModel;

class Kupac extends BazniKontroler
{
    
    protected function show($page, $data=[])
    {
        $data['controller']='Kupac';
        echo view("templates\\header_logged_in",$data);
        echo view("pages\\$page",$data);
        echo view("templates\\footer",$data);
    }
    
    public function index()
    {
        $this->show('main_kupac',[]);
    }
    
    public function o_nama()
    {
        $this->show('o_nama',[]);
    }
    
    public function kontakt()
    {
        $this->show('kontakt',[]);
    }
    
    public function nova_lista()
    {
        $this->show('nova_lista',[]);
    }
    
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