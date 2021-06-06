<?php

namespace App\Controllers;

use App\Models\KorisnikModel;
use App\Models\RadnjaModel;
use App\Models\ProdajeModel;
use App\Models\ArtikalModel;

/**
 * Klasa koja predstavlja kontroler za predstavnika radnje
 * @author Milena Djuric 2018/0630
 * @author David Kostic 2016/0624
 * 
 * @version 1.0
 */
class Predstavnik extends BazniKontroler
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
        $data['controller']='Predstavnik';
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
        $this->show('main_predstavnik',[]);
    }
    
    /**
    * Prikaz stranice za izmenu radnje sa svim artiklima i svim sto prodaje i
    * svim sto ne prodaje ta radnja
    *
    * @return void
    *
    */
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
    
    /**
    * Obrada uklanjanja radnje
    *
    * @return void
    *
    */
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
    
    /**
    * Obrada dodavanja artika u radnju
    *
    * @return void
    *
    */
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
    
    /**
    * Obrada uklanjanja artika iz radnje
    * 
    * @param integer $idA idArtikla
    *
    * @return void
    *
    */
    public function ukloni_artikal($idA)
    {
        
        $rm = new RadnjaModel();
        $pm = new ProdajeModel();
        $radnja = $rm->pretraga_idK($this->session->get("idK"));
        $prodaje = $pm->pretraga_idA_idR($idA,$radnja[0]->idRadnje);
        $pm->delete($prodaje[0]->idProdaje);
        return redirect()->to(site_url("/Predstavnik/izmeni_radnju"));
    }
    
    /**
    * Obrada promene cene artikla u radnji
    * 
    * @param integer $idA idArtikla
    *
    * @return void
    *
    */
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