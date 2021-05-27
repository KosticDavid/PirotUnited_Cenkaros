<?php

namespace App\Controllers;

use App\Models\KorisnikModel;
use App\Models\RadnjaModel;
use App\Models\ProdajeModel;

class Predstavnik extends BazniKontroler
{
    
    protected function show($page, $data=[])
    {
        $data['controller']='Predstavnik';
        echo view("templates\\header_logged_in",$data);
        echo view("pages\\$page",$data);
        echo view("templates\\footer",$data);
    }
    
    public function index()
    {
        $this->show('main_predstavnik',[]);
    }
    
    public function izmeni_radnju()
    {
        $this->show('radnja_dodavanje_ukljanjanje_promena',[]);
    }
    
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
    
    public function o_nama()
    {
        $this->show('o_nama',[]);
    }
    
    public function kontakt()
    {
        $this->show('kontakt',[]);
    }
    
}