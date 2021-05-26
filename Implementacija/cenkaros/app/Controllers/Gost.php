<?php

namespace App\Controllers;

use App\Models;
use App\Controllers\BazniKontroler;

class Gost extends BazniKontroler
{
    
    protected function show($page, $data=[])
    {
        $data['controller']='Gost';
        echo view("templates\\header_logged_out",$data);
        echo view("pages\\$page",$data);
        echo view("templates\\footer",$data);
    }
        
    public function index()
    {
        return redirect()->to(site_url('Gost/prijava'));
    }

    public function prijava()
    {
        $this->show('prijava',[]);
//        $radnje = $this->doctrine->em->getRepository('App\\Models\\Entities\\Radnja')->findAll();
//        foreach($radnje as $radnja)
//        {
//            echo $radnja->getNaziv();
//            echo "</br>";
//            echo $radnja->getSirina();
//            echo "</br>";
//            echo $radnja->getDuzina();
//            echo "</br>";
//            echo $radnja->getPib();
//            echo "</br><hr>";
//        }
    }

    public function registracija($poruka="")
    {
        $this->show('slanje_zahteva_za_registraciju',['poruka'=>$poruka]);
    }
    
    public function zahtev_za_registraciju()
    {
        
//        if(!$this->validate(['uname'=>'required', 'pword'=>'required']))
//            return $this->show('registracija', ['errors'=>$this->validator->getErrors()]);
//        
//        $korisnik=$this->doctrine->em->getRepository(Entities\Korisnik::class)->find($this->request->getVar('uname'));
//       
//        if($korisnik==null) return $this->registracija('Korisnik ne postoji');
//        if($korisnik->getSifra()!=$this->request->getVar('lozinka')) return $this->registracija('Pogresna lozinka');
//        
//        $this->session->set('autor', $autor);
//        return redirect()->to(site_url('Gost'));
        
    }
    
    public function o_nama()
    {
        $this->show('o_nama',[]);
    }
    
    public function kontakt()
    {
        $this->show('kontakt',[]);
    }
    
    public function david()
    {
        echo "<p>David</p>";
    }
    
}