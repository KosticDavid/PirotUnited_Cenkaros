<?php

namespace App\Controllers;

class Gost extends BaseController
{
    
    protected function show($page, $data=[])
    {
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
    }

    public function registracija()
    {
        $this->show('slanje_zahteva_za_registraciju',[]);
    }
}